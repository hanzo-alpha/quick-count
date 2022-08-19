<?php

namespace App\Database\Query\Grammars;
//use App\Database\Query\Grammars\MySqlGrammar;


class MySqlGrammar extends \Illuminate\Database\Query\Grammars\MySqlGrammar
{
    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.u';
    }
}
