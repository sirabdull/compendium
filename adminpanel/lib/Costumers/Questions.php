<?php
class Questions
{
    /**
     *
     */
    public function __construct()
    {
    }

    /**
     *
     */
    public function __destruct()
    {
    }
    
    /**
     * Set friendly columns\' names to order tables\' entries
     */
    public function setOrderingValues()
    {
        $ordering = [
            'question_id' => 'ID',
            'question_text' => 'Question',
            'subject' => 'subject',
            'year' => 'year',
           
        ];

        return $ordering;
    }
}
?>
