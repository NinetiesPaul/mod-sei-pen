<?php

use PHPUnit\Framework\TestCase;

/**
 * Classe de teste para o m�todo buscarEstrutura da classe ProcessoEletronicoRN.
 * 
 * Esta classe utiliza PHPUnit para verificar o comportamento do m�todo buscarEstrutura
 * em diferentes cen�rios, garantindo que ele funcione conforme o esperado.
 */
class BuscarEstruturaTest extends TestCase
{
    /**
     * Mock da classe ProcessoEletronicoRN.
     * 
     * @var ProcessoEletronicoRN|\PHPUnit\Framework\MockObject\MockObject
     */
    private $mockService;

    /**
     * Configura��o inicial do teste.
     * 
     * Este m�todo cria um mock da classe ProcessoEletronicoRN e redefine
     * o m�todo 'get' para simular comportamentos durante os testes.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->mockService = $this->getMockBuilder(ProcessoEletronicoRN::class)
                                  ->onlyMethods(['get'])
                                  ->getMock();
    }

    public function testBuscarEstruturaSucesso()
    {
        $mockResponse = [
            "numeroDeIdentificacaoDaEstrutura" => "157406",
            "nome" => "CGPRO_PAUL_ORG1",
            "sigla" => "CGPRO_PAUL_ORG1",
            "ativo" => true,
            "unidadeProtocolizadora" => false,
            "unidadeReceptora" => false,
            "aptoParaReceberTramites" => true,
            "codigoNoOrgaoEntidade" => "",
            "codigoUnidadeReceptora" => null,
            "codigoUnidadeProtocolizadora" => null,
            "tipoDeTramitacao" => 1,
            "hierarquia" => []
        ];

        // Configura o mock para retornar a resposta
        $this->mockService->expects($this->once())
                          ->method('get')
                          ->willReturn($mockResponse);

        $resultado = $this->mockService->buscarEstrutura(5, 157406);

        $this->assertInstanceOf(EstruturaDTO::class, $resultado, 'O retorno deve ser uma inst�ncia da classe EstruturaDTO.');
    }

    public function testBuscarEstruturaLancaExcecao()
    {
        $this->mockService->expects($this->once())
                          ->method('get')
                          ->willThrowException(new Exception());

        $this->expectException(InfraException::class);
        $this->expectExceptionMessage('Falha na obten��o de unidades externas');

        $this->mockService->consultarEstrutura(159098, 152254, false);
    }
}
