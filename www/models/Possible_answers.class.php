<?php
    class Possible_answers extends BaseSQL
    {
        protected $id = null;
        protected $content;
        protected $insertedDate;
        protected $updatedDate;
        protected $id_qcm;

        public function __construct()
        {
            parent::__construct();
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function setContent($content)
        {
            $this->content = $content;
        }

        public function setId_qcm($id_qcm)
        {
            $this->id_qcm = $id_qcm;
        }

        public function getId()
        {
            return $this->id;
        }

        public function getContent()
        {
            return $this->content;
        }

        public function getInsertedDate()
        {
            return $this->insertedDate;
        }

        public function getUpdatedDate()
        {
            return $this->updatedDate;
        }

        public function getId_qcm()
        {
            return $this->id_qcm;
        }
    }