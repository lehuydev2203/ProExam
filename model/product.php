<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 6/24/2018
 * Time: 8:33 PM
 */

namespace exam;


class product
{
private $masanpham;
private $maloai;
Private $loaisanpham;
private $tensanpham;
private $giasanpham;
private $xuatxu;
private $baohanh;
private $hinhanh;
private $mota;
private $ngaynhap;
private $tinhtrang;
private $luotxem;

    /**
     * @return mixed
     */
    public function getLuotxem()
    {
        return $this->luotxem;
    }

    /**
     * @param mixed $luotxem
     */
    public function setLuotxem($luotxem): void
    {
        $this->luotxem = $luotxem;
    }

    /**
     * @return mixed
     */
    public function getTinhtrang()
    {
        return $this->tinhtrang;
    }

    /**
     * @param mixed $tinhtrang
     */
    public function setTinhtrang($tinhtrang): void
    {
        $this->tinhtrang = $tinhtrang;
    }

    /**
     * @return mixed
     */
    public function getNgaynhap()
    {
        return $this->ngaynhap;
    }

    /**
     * @param mixed $ngaythem
     */
    public function setNgaynhap($ngaynhap): void
    {
        $this->ngaynhap = $ngaynhap;
    }

    /**
     * @return mixed
     */
    public function getMasanpham()
    {
        return $this->masanpham;
    }

    /**
     * @param mixed $masanpham
     */
    public function setMasanpham($masanpham): void
    {
        $this->masanpham = $masanpham;
    }

    /**
     * @return mixed
     */
    public function getMaloai()
    {
        return $this->maloai;
    }

    /**
     * @param mixed $maloai
     */
    public function setMaloai($maloai): void
    {
        $this->maloai = $maloai;
    }

    /**
     * @return mixed
     */
    public function getLoaisanpham()
    {
        return $this->loaisanpham;
    }

    /**
     * @param mixed $loaisanpham
     */
    public function setLoaisanpham($loaisanpham): void
    {
        $this->loaisanpham = $loaisanpham;
    }

    /**
     * @return mixed
     */
    public function getTensanpham()
    {
        return $this->tensanpham;
    }

    /**
     * @param mixed $tensanpham
     */
    public function setTensanpham($tensanpham): void
    {
        $this->tensanpham = $tensanpham;
    }

    /**
     * @return mixed
     */
    public function getGiasanpham()
    {
        return $this->giasanpham;
    }

    /**
     * @param mixed $giasanpham
     */
    public function setGiasanpham($giasanpham): void
    {
        $this->giasanpham = $giasanpham;
    }

    /**
     * @return mixed
     */
    public function getXuatxu()
    {
        return $this->xuatxu;
    }

    /**
     * @param mixed $xuatxu
     */
    public function setXuatxu($xuatxu): void
    {
        $this->xuatxu = $xuatxu;
    }

    /**
     * @return mixed
     */
    public function getBaohanh()
    {
        return $this->baohanh;
    }

    /**
     * @param mixed $baohanh
     */
    public function setBaohanh($baohanh): void
    {
        $this->baohanh = $baohanh;
    }

    /**
     * @return mixed
     */
    public function getHinhanh()
    {
        return $this->hinhanh;
    }

    /**
     * @param mixed $hinhanh
     */
    public function setHinhanh($hinhanh): void
    {
        $this->hinhanh = $hinhanh;
    }

    /**
     * @return mixed
     */
    public function getMota()
    {
        return $this->mota;
    }

    /**
     * @param mixed $mota
     */
    public function setMota($mota): void
    {
        $this->mota = $mota;
    }
}