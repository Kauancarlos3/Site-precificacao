<?php 


    //Tratamento Kg para g e mg
    if($dados['qtd_comprada_medida'] == 'Kg' && $dados['qtd_usada_medida'] == 'g' ){
        $calculo_comprada = $dados['qtd_comprada'] * 1000;
        
        $calculo_qtd_usada = ($dados['custo_total'] / $calculo_comprada) * $dados['qtd_usada'];
        $custo_formatado = number_format($calculo_qtd_usada, 2);

    }else if($dados['qtd_comprada_medida'] == 'Kg' && $dados['qtd_usada_medida'] == 'mg' ){
      $calculo_comprada = $dados['qtd_comprada'] * 1000000;

      $calculo_qtd_usada = ($dados['custo_total'] / $calculo_comprada) * $dados['qtd_usada'];
        $custo_formatado = number_format($calculo_qtd_usada, 2);
    }
    //Tratamento g para mg
    if($dados['qtd_comprada_medida'] == 'g' && $dados['qtd_usada_medida'] == 'mg' ){
      $calculo_comprada = $dados['qtd_comprada'] * 1000;

      $calculo_qtd_usada = ($dados['custo_total'] / $calculo_comprada) * $dados['qtd_usada'];
      $custo_formatado = number_format($calculo_qtd_usada, 2);

    }
    //Tratamento L para ml
    if($dados['qtd_comprada_medida'] == 'L' && $dados['qtd_usada_medida'] == 'mL' ){
      $calculo_comprada = $dados['qtd_comprada'] * 1000;

      $calculo_qtd_usada = ($dados['custo_total'] / $calculo_comprada) * $dados['qtd_usada'];
        $custo_formatado = number_format($calculo_qtd_usada, 2);

    }
    //tratamento particular Unidade
    if($dados['qtd_comprada_medida'] == 'Unidade' && $dados['qtd_usada_medida'] == 'Unidade' ){
      

      $calculo_qtd_usada = ($dados['custo_total'] / $dados['qtd_comprada']) * $dados['qtd_usada'];
      $custo_formatado = number_format($calculo_qtd_usada, 2);

    }
    //tratamento particular Kg
    if($dados['qtd_comprada_medida'] == 'Kg' && $dados['qtd_usada_medida'] == 'Kg' ){
      

      $calculo_qtd_usada = ($dados['custo_total'] / $dados['qtd_comprada']) * $dados['qtd_usada'];
      $custo_formatado = number_format($calculo_qtd_usada, 2);

    }
    //tratamento particular g
    if($dados['qtd_comprada_medida'] == 'g' && $dados['qtd_usada_medida'] == 'g' ){
      

      $calculo_qtd_usada = ($dados['custo_total'] / $dados['qtd_comprada']) * $dados['qtd_usada'];
      $custo_formatado = number_format($calculo_qtd_usada, 2);

    }
    //tratamento particular mg
    if($dados['qtd_comprada_medida'] == 'mg' && $dados['qtd_usada_medida'] == 'mg' ){
      

      $calculo_qtd_usada = ($dados['custo_total'] / $dados['qtd_comprada']) * $dados['qtd_usada'];
      $custo_formatado = number_format($calculo_qtd_usada, 2);

    }
    //tratamento particular L
    if($dados['qtd_comprada_medida'] == 'L' && $dados['qtd_usada_medida'] == 'L' ){

      $calculo_qtd_usada = ($dados['custo_total'] / $dados['qtd_comprada']) * $dados['qtd_usada'];
      $custo_formatado = number_format($calculo_qtd_usada, 2);

    }
    //tratamento particular mL
    if($dados['qtd_comprada_medida'] == 'mL' && $dados['qtd_usada_medida'] == 'mL' ){

      $calculo_qtd_usada = ($dados['custo_total'] / $dados['qtd_comprada']) * $dados['qtd_usada'];
      $custo_formatado = number_format($calculo_qtd_usada, 2);
    }

?>