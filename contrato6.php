<?php
	require_once 'acesso.php';
	require_once 'config.php';
	require_once 'permissao.php';
	
	@$userID = $_GET['userid'];	
	$getDados = mysqli_query($conexao, "SELECT * FROM usuarios WHERE id_usuario = $userID");
	$dados = mysqli_fetch_assoc($getDados);	

	$pessoa = ($dados['tipo_pessoa'] == 'F') ? "Física" : "Jurídica";
	$tipoPessoa = ($dados['tipo_pessoa'] == 'F') ? "CPF" : "CNPJ";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Contrato: Sua Empresa</title>
		<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
		<link rel="shortcut icon" href="imagens/favicon.ico">
		<link href="imagens/apple-touch-icon.png" rel="apple-touch-icon">
	</head>
	
	<body>
		<section style="width: 97%; margin: auto;">
			<h4 class="text-center"><strong>Contrato de monitoramento e rastreamento de veículos Sua Empresa e comodato de equipamentos.</strong></h4>
			<br />
			<p class="lead text-center">Contrato de Monitoramento e Rastreamento de Veículos</p>
			<p class="text-justify">Pelo presente instrumento particular, em que são partes, de um lado Sua Empresa, pessoa jurídica de direito privado, inscrita no CNPJ sob nº. 14.993.993/0001-54, sediada à Av. Dom Pedro I, 861, Vila Conceição, Diadema/SP, doravante denominada CONTRATADA e de outro, CONTRATANTE devidamente qualificado neste contrato, tem entre si, justo e avençado o presente contrato de monitoramento, rastreamento e bloqueio remoto via sistema de localização GPS e comunicação via telefonia celular móvel, bem como o comodato dos equipamentos listados no termo, doravante denominado apenas Rastreamento Veicular, mediante adesão às cláusulas e condições estabelecidas neste Contrato que reger-se-á pelas seguintes cláusulas e condições abaixo descritas:</p>
			<br />

			<h5><strong><center>Dados do Contratante:</center></strong></h5>
			<section class="row">
				<section class="col-xs-6"><p class="text-center"><strong>Nome:</strong> <?php echo $dados['nome']; ?></p></section>
				<section class="col-xs-6"><p class="text-center"><strong>Pessoa:</strong> <?php echo $pessoa; ?></p></section>
				<section class="col-xs-6"><p class="text-center"><strong>Endereço:</strong> <?php echo $dados['endereco']; ?></p></section>
				<section class="col-xs-6"><p class="text-center"><strong><?php echo $tipoPessoa; ?>:</strong> <?php echo $dados['cpf_cnpj']; ?></p></section>
			</section>
			<br />
			
			<h5><strong>Cláusula 1 - DO OBJETO</strong></h5>
			<p class="text-justify">1.1 – O presente instrumento tem por objeto o monitoramento, rastreamento e bloqueio remoto, quando contratado, via sistema com tecnologia de localização GPS e comunicação via telefonia celular móvel pela CONTRATADA ao CONTRATANTE, na área de cobertura da operadora de telefonia celular definida neste instrumento, além da cessão de direitos ao CONTRATANTE para a utilização do software de Rastreamento Veicular via Internet.</p>
			<p class="text-justify">1.2 - Fica convencionado que os serviços de monitoramento, rastreamento e bloqueio veicular serão prestados com a tecnologia GPS e comunicação via telefonia celular móvel.</p>
			<p class="text-justify">1.3 – Para realização dos serviços haverá o COMODATO de equipamentos devendo o contratante na oportunidade da contratação disponibilizar o veículo objeto do monitoramento, para instalação de rastreador de propriedade da CONTRATADA entregue ao CONTRATANTE na condição de comodato.</p>
			<p class="text-justify">1.4 - O serviço de monitoramento consiste em: atualização do posicional do veículo através de coordenadas de GPS em tempos pré programados identificados através de login e senha disponibilizada ao CONTRATANTE que por esse expediente efetivará o acesso aos posicionais do veículo através do site.</p>
			<br />

			<h5><strong>Cláusula 2 - DO SISTEMA DE RASTREAMENTO</strong></h5>
			<p class="text-justify">2.1 – O sistema permite o monitoramento e rastreamento remoto de um veículo através do envio de dados sistêmicos em períodos programados, com a utilização de telefonia celular móvel, a partir da informação obtida pelo sinal GPS.</p>
			<p class="text-justify">2.2 - O CONTRATANTE receberá da CONTRATADA o equipamento contratado, codificado com um número intransferível e em perfeito estado de funcionamento, por ocasião da instalação no veículo a ser indicado neste instrumento.</p>
			<p class="text-justify">2.3 - A prestação dos serviços terá início a partir da instalação e ativação do equipamento no veículo a ser monitorado, ficando o CONTRATANTE responsável pelos efeitos do contrato em relação ao veículo descritos neste contrato, ainda que a titularidade esteja em nome de terceiros.</p>
			<br />

			<h5><strong>Cláusula 3 - DOS SERVIÇOS E RESPONSABILIDADES</strong></h5>
			<p class="text-justify">3.1 - Uma vez instalado o equipamento no veículo do CONTRATANTE, a CONTRATADA fica autorizada, de forma expressa e sem ressalvas, a monitorar e rastrear o veículo, para o fim expresso neste contrato.</p>
			<p class="text-justify">3.2 - Qualquer intervenção no veículo do CONTRATANTE, uma vez provocada e solicitada, será avaliada pela CONTRATADA para operar o sistema no melhor momento, sem prejuízo de eventual bloqueio automático, quando contratado. Estas intervenções serão aceitas mediante solicitação do CONTRATANTE ou das pessoas autorizadas e determinadas no contrato pelo cliente, ou solicitação através da Central de Operações da CONTRATADA.</p>
			<p class="text-justify">3.3 - Nos casos em que a CONTRATANTE venha a operar o sistema por si ou por intermédio de empresa terceirizada, a intervenção ficará a seu critério, bem como as providências e responsabilidades inerentes à operação.</p>
			<p class="text-justify">3.4 - O presente instrumento contratual não constitui apólice de seguro, sendo que a prestação dos serviços de rastreamento e monitoramento da CONTRATADA visa minimizar e tentar frustrar a possibilidade de sucesso na ocorrência de roubos e furtos veiculares e não substitui qualquer outro equipamento antifurto instalado no veículo do CONTRATANTE.</p>
			<p class="text-justify">3.5 - O CONTRATANTE está ciente de que o equipamento opera por sistema de telefonia celular móvel, estando desta forma sujeito às condições de recepção de sinais da rede de telefonia celular móvel por parte da operadora, o qual pode sofrer interferência que impeça seu funcionamento regular, não se caracterizando desta forma, responsabilidade da CONTRATADA por prejuízos sofridos pelo CONTRATANTE, quando da ocorrência dessas anomalias, durante o curso deste contrato.</p>
			<p class="text-justify">3.6 - O CONTRATANTE reconhece que os serviços prestados, rastreamento, bloqueio a CONTRATADA não garantem que o veículo do cliente seja 100% recuperado. Os serviços ora propostos visam dificultar a ação dos infratores e frustrar a tentativa de furto e/ou roubo.</p>
			<p class="text-justify">3.7 - O CONTRATANTE reconhece e assume todas as responsabilidades decorrentes de uma ação de intervenção da CONTRATADA nas suas solicitações, com referência ao bloqueio de veículo em movimento, o que levará o respectivo veículo a parar em poucos minutos, podendo sofrer avarias e provocar danos a terceiros, mesmo que o CONTRATANTE ou condutor autorizado não esteja na posse do veículo na hora da intervenção da CONTRATADA.</p>
			<p class="text-justify">3.8 – Na hipótese de intervenção do CONTRATANTE ou empresa terceirizada para este fim, o sistema será operado diretamente pelos interessados, sem que a CONTRATADA tenha participação no evento.</p>
			<p class="text-justify">3.9 - O CONTRATANTE se compromete e se responsabiliza pelo comunicado aos órgãos competentes do poder público, na eventualidade de roubo e furto, bem como, caso o veículo esteja segurado, comunicar também a empresa seguradora responsável, assumindo também eventuais danos que venham ocorrer em razão do não cumprimento das obrigações aqui estipuladas.</p>
			<p class="text-justify">3.10 - O CONTRATANTE não poderá responsabilizar a CONTRATADA por problemas na operação do equipamento, ocorridos por falhas na rede de telecomunicações, em virtude de sombras, indisponibilidade momentânea ou definitiva de sinais, ou ainda impossibilidade de comunicação com o equipamento em áreas sem cobertura, bem como na ocorrência de caso fortuito ou de força maior.</p>
			<p class="text-justify">3.11 - As instalações e desinstalações do equipamento pela CONTRATADA serão realizadas observando-se o preço de tabela fornecido pela CONTRATADA.</p>
			<p class="text-justify">3.12 - A CONTRATADA não se responsabiliza pela eventual perda de garantia de fábrica do veículo, em função da instalação do equipamento objeto deste contrato, sendo de total conhecimento do CONTRATANTE que a instalação de tais equipamentos pode ensejar a perda de garantia dos fabricantes.</p>
			<p class="text-justify">3.13 – A CONTRATADA está na responsabilidade de auxiliar o CONTRATANTE junto aos órgãos competentes do poder público, na eventualidade de roubo ou furto, através da sua central de monitoramento, não sendo obrigada a acompanhar o CONTRATANTE na busca e apreensão do veículo.</p>
			<br />

			<h5><strong>Cláusula 4 - DO PRAZO</strong></h5>
			<p class="text-justify">4.1 – O presente contrato tem validade de 12 (doze) meses, sendo que, após este período, será automaticamente renovado por iguais períodos e, caso o CONTRATANTE não intencione renovar o contrato, deverá comunicar à CONTRATADA por escrito, com antecedência mínima de 30 (trinta) dias anteriormente ao término deste contrato.</p>
			<p class="text-justify">4.2 - A inadimplência do CONTRATANTE por 10 (dez) dias ensejará na suspensão do funcionamento do sistema de Rastreamento Veicular até a completa regularização da pendência financeira do CONTRATANTE, sem que essa liberalidade represente qualquer novação ou gere direitos às tolerâncias futuras em casos de reincidências. E uma inadimplência por um prazo superior a 45 (quarenta e cinco) dias ensejará na extinção do contrato pela a CONTRATADA.</p>
			<br />

			<h5><strong>Cláusula 5 - DO PAGAMENTO E CONDIÇÕES DE USO</strong></h5>
			<p class="text-justify">5.1 - Pela consecução integral deste Contrato, o CONTRATANTE pagará à CONTRATADA os valores descritos no ANEXO I neste instrumento, referente à habilitação, instalação, aquisição do sistema de Rastreamento Veicular, no importe de R$ <?=$dados['adesao']?> e mensalidades de locação e prestação de serviços de monitoramento de acordo com as condições descritas.</p>
			<p class="text-justify">5.2 - A primeira parcela de pagamento deverá ser paga por ocasião da instalação, sendo calculada na forma de pro rata die, contado a partir da data de instalação do sistema de Rastreamento Veicular até o dia 30 (trinta) do mês da instalação, sendo os vencimentos das parcelas pactuados no Termo de Adesão respectivo (ANEXO I).</p>
			<p class="text-justify">5.3 - O CONTRATANTE fica ciente que o valor de locação e demais serviços serão atualizados monetariamente, a cada 12 (doze) meses a contar do primeiro pagamento, pelo IGPM (Índice Geral de Preços do Mercado).</p>
			<p class="text-justify">5.4 – Sem prejuízo do direito de cobrança da multa estabelecida neste contrato, em caso de falta de pagamento pelo CONTRATANTE de qualquer das mensalidades, a CONTRATADA se reserva no direito de suspender temporariamente a prestação dos serviços transcorridos 15 (quinze) dias, desde a suspensão dos serviços sem que o cliente tenha quitado os valores em atraso, a CONTRATADA poderá cancelar os serviços definitivamente, dando por rescindido a contratação dos serviços, por culpa do cliente, e inscrever o nome do contratante perante os serviços de proteção ao crédito e congêneres, incidindo ainda a clausula penal prevista neste contrato. </p>
			<p class="text-justify">5.5 - O CONTRATANTE autoriza a CONTRATADA a emitir duplicatas de prestação de serviços para cobrança dos valores decorrentes do presente contrato, podendo proceder ao apontamento desses títulos ao protesto por falta de pagamento, independentemente do aceite, o qual é suprido por esta contratação.</p>
			<p class="text-justify">5.6 - Declara o CONTRATANTE ter sido devidamente instruído quanto ao funcionamento do sistema CONTRATADA, referente ao correto funcionamento do equipamento cedido, recebendo neste ato o CONTRATANTE, o seu login e senha para acessar o sistema de monitoramento de Frota, bem como instruções de funcionamento, podendo o CONTRATANTE recorrer à área técnica da CONTRATADA para esclarecimentos de quaisquer dúvidas.</p>
			<br />
			
			<h5><strong>Cláusula 6 - CONDIÇÕES ESPECÍFICAS DE COMODATO E PRESTAÇAO DE SERVIÇOS</strong></h5>
			<p class="text-justify">6.1 - O CONTRATANTE compromete-se a devolver à CONTRATADA o equipamento cedido na hipótese de rescisão contratual, seja qual for o motivo, independentemente de notificação, estando o mesmo ciente e desde já renunciando a alegação de desconhecimento, sendo que o descumprimento desta obrigação contratual caracterizará o crime de apropriação indébita, previsto no artigo 168 do Código Penal, sem prejuízo de indenização por perdas e danos.</p>
			<p class="text-justify">6.2 - Durante a vigência da locação, a CONTRATADA oferece manutenção do módulo principal e periféricos, não estando cobertos defeitos causados por manuseio deficiente, alimentação de energia fora das especificações do fabricante, descarga atmosféricas, armazenagem em condições inadequadas, sobrecarga elétrica aplicada aos equipamentos, ou ainda se forem feitos ajustes e consertos de peças por pessoas não habilitadas e/ou autorizadas para intervir nos equipamentos.</p>
			<p class="text-justify">6.3 - O prazo de vigência do comodato será renovado automaticamente a contar da data da instalação do equipamento e, caso o CONTRATANTE não intencione renovar o contrato, deverá comunicar à CONTRATADA por escrito, com antecedência mínima de 30 (trinta) dias anteriormente ao término deste contrato.</p>
			<p class="text-justify">6.4 - A impontualidade dos pagamentos implicará multa moratória de 10% (dez por cento) sobre o valor de locação mensal do equipamento em aberto, sem prejuízo de atualização monetária pelo IGPM até a data do efetivo pagamento, além de juros na proporção de 1% ao mês de atraso.</p>
			<p class="text-justify">6.5 - Caso a inadimplência do CONTRATANTE seja superior a 60 (sessenta) dias, a CONTRATADA poderá dar o contrato por rescindido mediante comunicação por escrito, ocasião em que o CONTRATANTE será notificado pela CONTRATADA para que efetue os pagamentos devidos, incluindo-se as parcelas vincendas até a efetiva devolução do equipamento.</p>
			<p class="text-justify">6.6 - Em havendo a extinção deste contrato, o CONTRATANTE obrigasse a disponibilizar o veículo para a desinstalação do equipamento à CONTRATADA até 5 (cinco) dias úteis, seguintes ao término da avença, sendo que após esse prazo o CONTRATANTE ficará sujeito à multa moratória de 20% (vinte por cento) sobre o valor das parcelas vigentes à época do monitoramento, por dia de atraso no cumprimento desta obrigação, ensejando também a reintegração de posse liminar na hipótese de não devolução do equipamento e multa compensatória descrita nas condições gerais do contrato.</p>
			<p class="text-justify">6.7 – Passando-se o período de 60 (sessenta) dias, e o CONTRATANTE não quitou as parcelas em atraso e não devolveu o equipamento em comodato, ficará passivo de negativação por parte da CONTRATADA junto aos órgãos de proteção de crédito vigentes.</p>
			<br />
			
			<h5><strong>Cláusula 7 - INSTALAÇÃO - ASSISTÊNCIA TÉCNICA E TRANSFERÊNCIA</strong></h5>
			<p class="text-justify">7.1 – A instalação e a assistência técnica serão prestadas nos postos de atendimentos técnicos da CONTRATADA.</p>
			<p class="text-justify">7.2 - Fica estabelecido que somente os técnicos da CONTRATADA, próprios ou nomeados, terão direito de efetuar qualquer correção/reparos nos equipamentos cedidos em comodato pela CONTRATADA. O cliente, desde já, é responsável pelo equipamento instalado no seu veículo, não permitindo qualquer intervenção técnica no mesmo por pessoas não autorizadas pela CONTRATADA.</p>
			<p class="text-justify">7.3 - A instalação e a assistência técnica serão realizadas pela CONTRATADA através de técnicos treinados, qualificados e devidamente identificados, de segunda-feira a sábado, em horário comercial, nos postos de atendimento técnico da CONTRATADA ou em local indicado pela CONTRATADA.</p>
			<p class="text-justify">7.4 - O CONTRATANTE tem todo o direito de transferir o equipamento para outro veículo. Para tanto é necessário entrar em contato com a CONTRATADA, informando os dados do novo veículo a ser instalado aditando assim o contrato originário. A retirada e reinstalação serão efetuadas por técnicos credenciados da CONTRATADA. </p>
			<br />
			
			<h5><strong>Cláusula 8 - DISPOSIÇÕES GERAIS</strong></h5>
			<p class="text-justify">8.1 – A utilização do Software CONTRATADA através da internet pelo CONTRATANTE somente poderá ser feita através de LOGIN e SENHA específicos que serão de seu conhecimento exclusivo. Compete ao mesmo seu zelo, guarda e atualização da senha de acesso, sendo que a CONTRATADA não se responsabiliza pela utilização deste Login/Senha por terceiros não autorizados no Termo de Adesão.</p>
			<p class="text-justify">8.2 – A solicitação via central de qualquer ativação do sistema de Rastreamento Veicular, seja Bloqueio, Desbloqueio ou Rastreamento, somente poderá ser efetuado pelo CONTRATANTE e pessoas indicadas no Termo de Adesão, ficando a CONTRATADA desde já autorizada pelo CONTRATANTE negar-se a atender qualquer pedido de terceiros desconhecidos.</p>
			<p class="text-justify">8.3 - O CONTRATANTE expressamente autoriza o necessário, por si e seus nomeados descritos no Termo de Adesão, parte integrante deste instrumento, para o fim de que a CONTRATADA proceda à gravação de todas as comunicações e/ou solicitações do CONTRATANTE, com vistas ao controle das operações e serviços.</p>
			<p class="text-justify">8.4 – Haverá a possibilidade de que a CONTRATANTE ou empresa terceirizada por conta de gerenciamento de risco venha a operar diretamente o sistema de rastreamento e bloqueio dos veículos, a partir da cessão de direitos de uso e instalação de software no cliente, que passará a assumir as atividades e responsabilidades decorrentes da operação do sistema.</p>
			<p class="text-justify">Parágrafo Único – Fica expressamente esclarecido que a cessão de direitos de uso do software não implica transferência de titularidade sobre o sistema, devendo ser interrompido e devolvido imediatamente em caso de rescisão do contrato.</p>
			<p class="text-justify">Parágrafo Primeiro - Fica o CONTRATANTE ciente que o serviço de bloqueio será efetuado sem custo adicional, desde que haja cobertura de comunicação celular móvel no local, ficando excetuada a hipótese na qual a CONTRATANTE ou empresa terceirizada venha a operar diretamente o sistema por conta de gerenciamento de risco.</p>
			<p class="text-justify">8.6 – Qualquer alteração da legislação tributária ou pacote governamental que implique alteração do equilíbrio econômico do contrato ensejará a renegociação das disposições contratuais afetadas.</p>
			<p class="text-justify">8.7 – O não exercício de direitos não implicará para qualquer das partes renúncia ou novação, tampouco aceitação tácita dos atos irregulares ou omitidos pela parte faltante.</p>
			<p class="text-justify">8.8 – O CONTRATANTE obriga-se a comunicar a CONTRATADA tudo o que se refira ao funcionamento e as instalações dos equipamentos, bem como quaisquer dúvidas referentes aos pagamentos e vencimentos das mensalidades, cabendo também ao contratante comunicar eventuais mudanças de dados especificados neste instrumento, enquanto isso não aconteça se terá como valido os lançados neste contrato.</p>
			<p class="text-justify">8.9 - A eventual anulação de um dos itens do presente instrumento não invalidará as demais regras deste Contrato.</p>
			<p class="text-justify">8.10 – A central de monitoramento da CONTRATADA ficará na responsabilidade de avisar o CONTRATANTE caso seja detectado algum defeito no equipamento em comodato, sendo possível a aquisição de material que comprove o contato com o CONTRATANTE. Caso haja alguma eventualidade de roubo ou furto do veículo, ou alguma perda que venha ser de obrigação contratual da CONTRATADA, no período após o aviso de defeito e o CONTRATANTE não se disponibilizou para sanar o problema, será de inteira responsabilidade do CONTRATANTE.</p>
			<p class="text-justify">Parágrafo Único – O CONTRATANTE se responsabiliza em manter seus dados cadastrais, que possam por ventura impossibilitar a comunicação entre ambos, atualizados, senão qualquer problema ocasionado no veículo será de responsabilidade do CONTRATANTE.</p>
			<br />

			<h5><strong>Cláusula 9 - SERVIÇOS DE ATENDIMENTO AO CLIENTE EM CASO DE ROUBO OU FURTO</strong></h5>
			<p class="text-justify">9.1 - Os serviços de atendimento ao cliente serão prestados pela CONTRATADA através de seu Call Center pelo número (11) 4053-2700 e informado ao cliente e pelo e-mail: rastreamento@Sua Empresa.com.br</p>
			<br />

			<h5><strong>Cláusula 10 - DA IRRETRATABILIDADE</strong></h5>
			<p class="text-justify">10.1 - O presente instrumento é celebrado em caráter irrevogável e irretratável, obrigando as partes e sucessores nas obrigações ora pactuadas.</p>
			<br />

			<h5><strong>Cláusula 11 - DO FORO DE ELEIÇÃO</strong></h5>
			<p class="text-justify">11.1 - Fica eleito o Foro de Diadema - Estado de São Paulo, com exclusão de qualquer outro por mais privilegiado que seja, para dirimir dúvidas de interpretação ou execução decorrentes do presente contrato.<br />
			E, por estarem justas e contratadas, assinam o presente instrumento em duas vias, na presença de testemunhas, para que surta os regulares efeitos legais.</p>
			<br />

			<p>Conceitos Técnicos:<br />
				<ul>
					<li><strong>Equipamento</strong> - É o equipamento eletrônico composto de sistema GPS, processador e modem de comunicação para a prestação de serviço do sistema da CONTRATADA.</li>
					<li><strong>GSM/GPRS</strong> - São sistemas de transmissão de dados via telefonia celular que operam nas condições, limitações e ÁREA DE COBERTURA definidas pelas operadoras de telefonia móvel.</li>
					<li><strong>Área de Cobertura</strong> - A área de cobertura compreende todas as regiões do país onde estejam disponíveis sinais de GPS e de GPRS sendo que a atualização da área de cobertura fica sob responsabilidade da operadora de telefonia móvel contratada.</li>
					<li><strong>Bloqueio</strong> - Comando enviado pela central ao EQUIPAMENTO ou disparado automaticamente através de programação que visa impossibilitar o funcionamento do motor do VEÍCULO.</li>
				</ul>
			</p>

			<br />

			<?php
				$mesAtual = date("M");
				
				switch($mesAtual){
					case "Jan": $mesAtual = "janeiro"; break;
					case "Feb": $mesAtual = "fevereiro"; break;
					case "Mar": $mesAtual = "março"; break;
					case "Apr": $mesAtual = "abril"; break;
					case "May": $mesAtual = "maio"; break;
					case "Jun": $mesAtual = "junho"; break;
					case "Jul": $mesAtual = "julho"; break;
					case "Aug": $mesAtual = "agosto"; break;
					case "Sep": $mesAtual = "setembro"; break;
					case "Oct": $mesAtual = "outubro"; break;
					case "Nov": $mesAtual = "novembro"; break;
					case "Dec": $mesAtual = "dezembro"; break;
				}
				
				echo "<p class='text-center'>São Paulo - SP, " . date("d") . " de $mesAtual de ". date("Y") . ".</p>";
			?>

			<br /><br />

			<section class="row">
				<section class="col-xs-6">
					<p class="text-center">_____________________________________</p>
					<p class="text-center">Sua Empresa</p>
				</section>
				<section class="col-xs-6">
					<p class="text-center">_____________________________________</p>
					<p class="text-center"><?php echo $dados['nome']; ?></p>
				</section>
			</section>
			<br />
			<section class="row">
				<section class="col-xs-12">
					<p class="text-center"><strong>Testemunhas</strong></p>
					<br /><br />
				</section>
				<section class="col-xs-6">
					<p class="text-center">_____________________________________</p>
					<p class="text-center">Fausto Ferrari</p>
					<br />
					<p class="text-center">_____________________________________</p>
					<p class="text-center">CPF</p>
				</section>
				<section class="col-xs-6">
					<p class="text-center">_____________________________________</p>
					<p class="text-center">NOME</p>
					<br />
					<p class="text-center">_____________________________________</p>
					<p class="text-center">CPF</p>
				</section>
			</section>

			<section class="break"></section>

			

			<h4 class="text-center"><strong>Anexo</strong></h4><br />
			<p class="lead text-center">Termo de Adesão</p><br />

			<p class="text-justify">
				<?=strtoupper($dados['nome'])?>, portador do <?php echo $tipoPessoa; ?> nº. <?=strtoupper($dados['cpf_cnpj'])?>, situado no endereço <?=strtoupper($dados['endereco'])?>, oficializa junto a Sua Empresa a adesão ao comodato de equipamento rastreador veicular e ao sistema de monitoramento.
			</p>
			
			<br />
			
			<h5><strong><center>Dados Complementares:</center></strong></h5><br />
			
			<section class="row">
				<center>
					<section class="col-xs-4"><b>Telefone Fixo: </b><?=$dados['telefone']?></section>
					<section class="col-xs-4"><b>Celular: </b><?=$dados['celular']?></section>
					<section class="col-xs-4"><b>E-mail: </b><?=$dados['email']?></section>
				</center>
			</section>
			
			<br />
			<br />
			
			<p class="text-center"><em>OBS.: É de inteira responsabilidade do contratante manter atualizados seus dados cadastrais junto a Sua Empresa, principalmente dados para contato.</em></p>
			
			<br />
			<hr />
			
			<p class="lead text-center">Veículos autorizados para Instalação do Equipamento de Rastreamento</p>

			<?php 
				$getVeiculos = mysqli_query($conexao, "SELECT * FROM bem WHERE cliente = $userID");
				$qtdVeiculos = mysqli_num_rows($getVeiculos);
				
				echo "<p class='text-center'><strong>Total de Rastreadores Instalados:</strong> $qtdVeiculos unidade(s).</p><br />";

				while($dadosBem = mysqli_fetch_assoc($getVeiculos)){
					echo 
						"<p>
							<section class='row'>
								<section class='col-xs-4'><p class='text-center'><strong>Placa:</strong> " . $dadosBem['name'] . "</p></section>
								<section class='col-xs-4'><p class='text-center'><strong>Marca:</strong> " . $dadosBem['marca'] . "</p></section>
								<section class='col-xs-4'><p class='text-center'><strong>Rastreador:</strong> " . $dadosBem['modelo_rastreador'] . "</p></section>
							</section>
			
							<section class='row'>
								<section class='col-xs-4'><p class='text-center'><strong>Número:</strong> " . $dadosBem['identificacao'] . "</p></section>
								<section class='col-xs-4'><p class='text-center'><strong>Modelo:</strong> " . $dadosBem['modelo'] . "</p></section>
								<section class='col-xs-4'><p class='text-center'><strong>IMEI:</strong> " . $dadosBem['imei'] . "</p></section>
							</section>
						</p>	
						<br />
						<br />";
				}	
			?>

			<hr />
			<br />
			<p class="lead text-center">Pessoas autorizadas a utilizarem o Sistema de Monitoramento</p>
			<section class="row">
				<section class="col-xs-6"><p class='text-center'><strong>Nome:</strong> _____________________________</p></section>
				<section class="col-xs-6"><p class='text-center'><strong>CPF:</strong> _____________________________</p></section>
			</section>
			<br />
			<section class="row">
				<section class="col-xs-6"><p class='text-center'><strong>RG:</strong> _______________________________</p></section>
				<section class="col-xs-6"><p class='text-center'><strong>Telefone:</strong> __________________________</p></section>
			</section>
			
			<br />
			<br />
			
			<section class="row">
				<section class="col-xs-6"><p class='text-center'><strong>Nome:</strong> _____________________________</p></section>
				<section class="col-xs-6"><p class='text-center'><strong>CPF:</strong> _____________________________</p></section>
			</section>
			<br />
			<section class="row">
				<section class="col-xs-6"><p class='text-center'><strong>RG:</strong> _______________________________</p></section>
				<section class="col-xs-6"><p class='text-center'><strong>Telefone:</strong> __________________________</p></section>
			</section>

			<br />
			<hr />
			
			<p class="lead text-center">Dados para geração das duplicatas</p>
			<section class="row">
				<section class="col-xs-4"><p class='text-center'><strong>Dia Vencimento: </strong><?=$dados['data_vencimento']?></p></section>
				<section class="col-xs-4"><p class='text-center'><strong>Valor da Adesão: </strong>R$ <?=$dados['adesao']?></p></section>
				<section class="col-xs-4"><p class='text-center'><strong>Valor da Mensalidade: </strong>R$ <?=$dados['mensalidade']?></p></section>
			</section>

			<br /><br />

			<section class="row">
				<section class="col-xs-6">
					<p class="text-center">_______________________, ___/___/____</p>
					<p class="text-center">Local e Data</p>
				</section>
				<section class="col-xs-6">
					<p class="text-center">____________________________</p>
					<p class="text-center">Assinatura do Responsável</p>
				</section>
			</section>
			
			<br />
			<br />
			<br />
		</section>
	</body>
</html>