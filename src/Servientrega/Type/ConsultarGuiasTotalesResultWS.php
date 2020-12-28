<?php

namespace App\Servientrega\Type;

class ConsultarGuiasTotalesResultWS
{
    /**
     * @var float
     */
    private $Id_Tipoguia;

    /**
     * @var string
     */
    private $GuiasUtilizadas;

    /**
     * @var string
     */
    private $NombreTipoGuia;

    /**
     * @var float
     */
    private $GuiaRangoInicial;

    /**
     * @var float
     */
    private $GuiaRangoFinal;

    /**
     * @var string
     */
    private $GuiaActual;

    /**
     * @return float
     */
    public function getId_Tipoguia()
    {
        return $this->Id_Tipoguia;
    }

    /**
     * @param float $Id_Tipoguia
     *
     * @return ConsultarGuiasTotalesResultWS
     */
    public function withId_Tipoguia($Id_Tipoguia)
    {
        $new              = clone $this;
        $new->Id_Tipoguia = $Id_Tipoguia;

        return $new;
    }

    /**
     * @return string
     */
    public function getGuiasUtilizadas()
    {
        return $this->GuiasUtilizadas;
    }

    /**
     * @param string $GuiasUtilizadas
     *
     * @return ConsultarGuiasTotalesResultWS
     */
    public function withGuiasUtilizadas($GuiasUtilizadas)
    {
        $new                  = clone $this;
        $new->GuiasUtilizadas = $GuiasUtilizadas;

        return $new;
    }

    /**
     * @return string
     */
    public function getNombreTipoGuia()
    {
        return $this->NombreTipoGuia;
    }

    /**
     * @param string $NombreTipoGuia
     *
     * @return ConsultarGuiasTotalesResultWS
     */
    public function withNombreTipoGuia($NombreTipoGuia)
    {
        $new                 = clone $this;
        $new->NombreTipoGuia = $NombreTipoGuia;

        return $new;
    }

    /**
     * @return float
     */
    public function getGuiaRangoInicial()
    {
        return $this->GuiaRangoInicial;
    }

    /**
     * @param float $GuiaRangoInicial
     *
     * @return ConsultarGuiasTotalesResultWS
     */
    public function withGuiaRangoInicial($GuiaRangoInicial)
    {
        $new                   = clone $this;
        $new->GuiaRangoInicial = $GuiaRangoInicial;

        return $new;
    }

    /**
     * @return float
     */
    public function getGuiaRangoFinal()
    {
        return $this->GuiaRangoFinal;
    }

    /**
     * @param float $GuiaRangoFinal
     *
     * @return ConsultarGuiasTotalesResultWS
     */
    public function withGuiaRangoFinal($GuiaRangoFinal)
    {
        $new                 = clone $this;
        $new->GuiaRangoFinal = $GuiaRangoFinal;

        return $new;
    }

    /**
     * @return string
     */
    public function getGuiaActual()
    {
        return $this->GuiaActual;
    }

    /**
     * @param string $GuiaActual
     *
     * @return ConsultarGuiasTotalesResultWS
     */
    public function withGuiaActual($GuiaActual)
    {
        $new             = clone $this;
        $new->GuiaActual = $GuiaActual;

        return $new;
    }
}
