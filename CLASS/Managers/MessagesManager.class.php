<?php

class MessagesManager
{
    public $message;
    public $writer;
    public $reader;

    public function __construct(
        $message,
        $writer,
        $reader
    ){
        $this->message = $message;
        $this->writer  = $writer;
        $this->reader  = $reader;
    }

    public function InsertMessage()
    {
        $date = date("Y-m-d H:i:s");

        $insertmessage = DatabaseManager::InsertInto("messages", array('message' => addslashes($this->message),
                                                                       'writeruid'  => addslashes($this->writer),
                                                                       'readeruid'  => addslashes($this->reader),
                                                                       'date'       =>$date));
    }

    public function ReadMessage()
    {
        $mes = array();
        $i = 0;

        $selectmessage = DatabaseManager::selectBySQL("SELECT * FROM messages WHERE writeruid='{$this->writer}' OR writeruid='{$this->reader}' OR readeruid='{$this->writer}' OR readeruid='{$this->reader}' ORDER BY date");

        if($selectmessage == true){
            foreach($selectmessage as $arr){
                $data = $arr;

                if(($data['writeruid'] == $this->writer || $data['writeruid'] == $this->reader) && ($data['readeruid'] == $this->writer || $data['readeruid'] == $this->reader)){
                    $mes[$i] = $data['message'];
                    $i++;
                }

            }
            return $mes;
        }
    }


}