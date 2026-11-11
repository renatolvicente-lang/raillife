# APIs externas no RAILLIFE

Esta nota registra as integrações gratuitas usadas pela página inicial e pelo cadastro de usuários.

## Clima da dashboard

A página inicial consulta o endpoint gratuito de previsão do Open-Meteo para Joinville (latitude -26.3044, longitude -48.8456). A resposta única fornece temperatura, sensação térmica, umidade relativa e horário local da medição.

### Precisão e disponibilidade

O endpoint entrega condições atuais estimadas por modelos meteorológicos. São adequadas como referência geral para a dashboard, mas podem divergir de uma estação local; por isso a interface identifica os dados como estimativa e exibe o horário informado pela API. A chamada tem limite de espera e apresenta mensagem alternativa se não houver resposta válida.

## Validação de CEP

O cadastro e a edição de usuários consultam o serviço gratuito ViaCEP no servidor. O CEP é normalizado para oito dígitos e uma resposta de CEP inexistente não permite salvar o registro.

A validação diferencia um CEP inválido ou não encontrado de uma falha temporária de rede/API. Em ambos os casos o registro não é salvo; a mensagem orienta corrigir o CEP ou tentar novamente.

### Escopo por cadastro

No esquema atual, somente `usuarios` possui campos de endereço e CEP. Trens, rotas e sensores não armazenam CEP; a validação fica associada ao único CRUD com esse dado, sem introduzir campos ou mudanças de banco não solicitadas.
