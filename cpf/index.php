<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
  /*
   * Algoritmo do CPF - O que está por trás do gerador de CPF
   * Para exemplificar o processo vamos gerar um CPF válido, calculando os dígitos verificadores de um número hipotético, 111.444.777-XX.
   * Calculando o Primeiro Dígito Verificador
   * O primeiro dígito verificador do CPF é calculado utilizando-se o seguinte algoritmo. 
   */

function validaCPF($cpf){    
  
  $cpf = preg_replace('/[^0-9]/','',$cpf);
  
  $digitoA = 0;
  $digitoB = 0;
  
  # For para pegar todos os indices e agrupar
  for($i = 0, $x = 10; $i <= 8; $i++, $x--){      
     $digitoA += $cpf[$i] * $x;
      //$digitoB = 
     // echo '<br/>';
  }
  
  for($i = 0, $x = 11; $i <= 9; $i++, $x--){ 
      
      # Verifica se foi digito numeros iguais
      if(str_repeat($i, 11) == $cpf){
          return false;
      }
      
     $digitoB += $cpf[$i] * $x;    
  }
  
  $somaA = (($digitoA%11) < 2 ) ? 0 : 11-($digitoA%11);
  $somaB = (($digitoB%11) < 2 ) ? 0 : 11-($digitoB%11);
    
  if($somaA != $cpf[9] || $somaB != $cpf['10']){
      return false;
  } else {
      return true;
  }
   
}

/*
 * Testando a Função para validar CPF
 * Você pode acessar o link e criar um CPF para teste
 * http://www.geradorcpf.com/
 */

if(validaCPF('484.889.528-64')) {
    echo 'CPF Válido';
} else {
    echo 'Invalido';
}

?>