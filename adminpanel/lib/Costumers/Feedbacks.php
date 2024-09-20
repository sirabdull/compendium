<?php
class Feedbacks
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
            'id' => 'ID',
            'email' => 'Email',
            'name' => 'name',
            'isresolved' => 'isresolved',
           
        ];

        return $ordering;
    }
}
?>
