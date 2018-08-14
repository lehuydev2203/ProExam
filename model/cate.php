<?php
/**
 * Created by PhpStorm.
 * User: nhoxk
 * Date: 7/7/2018
 * Time: 11:58 PM
 */

namespace exam;


class cate
{
private $maloai;
private $loaisanpham;
private $maloaicon;

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
    public function getMaloaicon()
    {
        return $this->maloaicon;
    }

    /**
     * @param mixed $maloaicon
     */
    public function setMaloaicon($maloaicon): void
    {
        $this->maloaicon = $maloaicon;
    }


}