<?php
/**
 * @author Peter Clayder
 */
namespace app\model\telegram;

class Bot
{
    /**
     * Obtém todas as mensagens enviadas para o bot
     * @return void
     */
    public function processMessage()
    {
        //obtém as atualizações do bot
        $update_response = file_get_contents(API_URL . "getupdates");
        $response = json_decode($update_response, true);
        $length = count($response["result"]);
        for ($i = 0; $i < $length; $i++) {
            $update = $response["result"][$i];
            pre($update);
        }

    }

    /**
     * @param string $mensagem
     * @param int $chatId
     * @return void
     */
    public function sendMessage($mensagem, $chatId)
    {
        $method = "sendMessage";
        $parameters = array('chat_id' => $chatId, "text" => $mensagem);
        $options = array(
            'http' => array(
                'method' => 'POST',
                'content' => json_encode($parameters),
                'header' => "Content-Type: application/json\r\n" .
                    "Accept: application/json\r\n"
            )
        );
        /**
         * criar um fluxo de contexto (um conjunto de de informações referentes a uma requisição http, ftp, ssl, etc)
         * e configurar a forma como a requisição será realizada.
         */
        $context = stream_context_create($options);
        /**
         * Envia a requisição de uma pagina x ao servidor
         */
        file_get_contents(API_URL . $method, false, $context);
    }

    /**
     * Busca os ids dos chats, configurados no sistema, e envia as mensagens.
     * @param string $mensagem
     * @return void
     */
    public function pacoteMensagem($mensagem = null)
    {
        if ($mensagem != null) {
            foreach (ARRAY_CHAT_ID as $chatId) {
                $this->sendMessage($mensagem, $chatId);
            }
        }
    }
}
