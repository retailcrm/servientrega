<?php

namespace App\Servientrega\Type;

class ConsultarTipoGuiasXCodSer
{

    /**
     * @var int
     */
    private $Ide_Producto;

    /**
     * @var string
     */
    private $Nom_Producto;

    /**
     * @var int
     */
    private $Ide_Forma_Pago;

    /**
     * @var string
     */
    private $Nom_forma_pago;

    /**
     * @var int
     */
    private $Ide_Tipo_Guia;

    /**
     * @return int
     */
    public function getIde_Producto()
    {
        return $this->Ide_Producto;
    }

    /**
     * @param int $Ide_Producto
     * @return ConsultarTipoGuiasXCodSer
     */
    public function withIde_Producto($Ide_Producto)
    {
        $new = clone $this;
        $new->Ide_Producto = $Ide_Producto;

        return $new;
    }

    /**
     * @return string
     */
    public function getNom_Producto()
    {
        return $this->Nom_Producto;
    }

    /**
     * @param string $Nom_Producto
     * @return ConsultarTipoGuiasXCodSer
     */
    public function withNom_Producto($Nom_Producto)
    {
        $new = clone $this;
        $new->Nom_Producto = $Nom_Producto;

        return $new;
    }

    /**
     * @return int
     */
    public function getIde_Forma_Pago()
    {
        return $this->Ide_Forma_Pago;
    }

    /**
     * @param int $Ide_Forma_Pago
     * @return ConsultarTipoGuiasXCodSer
     */
    public function withIde_Forma_Pago($Ide_Forma_Pago)
    {
        $new = clone $this;
        $new->Ide_Forma_Pago = $Ide_Forma_Pago;

        return $new;
    }

    /**
     * @return string
     */
    public function getNom_forma_pago()
    {
        return $this->Nom_forma_pago;
    }

    /**
     * @param string $Nom_forma_pago
     * @return ConsultarTipoGuiasXCodSer
     */
    public function withNom_forma_pago($Nom_forma_pago)
    {
        $new = clone $this;
        $new->Nom_forma_pago = $Nom_forma_pago;

        return $new;
    }

    /**
     * @return int
     */
    public function getIde_Tipo_Guia()
    {
        return $this->Ide_Tipo_Guia;
    }

    /**
     * @param int $Ide_Tipo_Guia
     * @return ConsultarTipoGuiasXCodSer
     */
    public function withIde_Tipo_Guia($Ide_Tipo_Guia)
    {
        $new = clone $this;
        $new->Ide_Tipo_Guia = $Ide_Tipo_Guia;

        return $new;
    }


}

