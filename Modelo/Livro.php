<?php

include '../Dao/LivroDao.php';
include '../Utilidades/ValidaDados.php';
include '../Utilidades/ExcessaoNomeInvalido.php';
include '../Utilidades/ExcessaoTituloInvalido.php';
include '../Utilidades/ExcessaoEditoraInvalida.php';

class Livro {
    
    private $titulo;
    private $autor;
    private $genero;
    private $edicao;
    private $editora;
    private $venda;
    private $troca;
    private $estado;
    private $descricao;
    
    
    function __construct($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao) {
        $this->setTitulo($titulo);
        $this->setAutor($autor);
        $this->setGenero($genero);
        $this->setEdicao($edicao);
        $this->setEditora($editora);
        $this->setVenda($venda);
        $this->setTroca($troca);
        $this->setEstado($estado);
        $this->setDescricao($descricao);
    }
    
    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        if(!ValidaDados::validaCamposnulos($titulo)){
            throw new ExcessaoTituloInvalido("Titulo nao pode ser nulo!");
        }else{
            $this->titulo = $titulo;
        }
        //Nao tera tratamento de excessao, pois o titulo é pessoal e vai de cada autor, 
        //logo pode ter qualquer tipo de caracter que o autor desejar
    }

    public function getAutor() {
        return $this->autor;   
    }

    public function setAutor($autor) {
        if(!ValidaDados::validaCamposNulos($autor)){
            throw new ExcessaoNomeInvalido("O nome do Autor nao pode ser nulo!");
        }elseif(ValidaDados::validaNome($autor) == 1){
            throw new ExcessaoNomeInvalido("Nome do Autor contem caracteres invalidos!");
        }elseif(ValidaDados::validaNome($autor) == 2){
            throw new ExcessaoNomeInvalido("Nome do Autor contem espaços seguidos!");
        }else{
            $this->autor = $autor;
        }
    }

    public function getGenero() {
        return $this->genero;
    }

    public function setGenero($genero) {
        $this->genero = $genero;
    }

    public function getTroca() {
        return $this->troca;
    }

    public function setTroca($troca) {
        $this->troca = $troca;
    }
    
    public function getVenda() {
        return $this->venda;
    }

    public function setVenda($venda) {
        $this->venda = $venda;
    }
    
    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function defineTiposDeGeneros() { //Genero por engenharia
        define("ENGENHARIA", "Engenharia", TRUE);
        define("SOFTWARE", "Engenharia de Software", TRUE);
        define("ELETRONICA", "Engenharia Eletronica", TRUE);
        define("ENERGIA", "Engenharia de Energia", TRUE);
        define("AUTOMOTIVA", "Engenharia Automotiva", TRUE);
        define("AEROESPACIAL", "Engenharia Aeroespacial", TRUE);
        
        return array(ENGENHARIA,SOFTWARE, ELETRONICA, ENERGIA, AUTOMOTIVA, AEROESPACIAL);
    }
    
    public function getEdicao() {
        return $this->edicao;
    }
    
    public function setEdicao($edicao){
        $this->edicao = $edicao;//Precisa validar entrada só de números
    }
    
    public function getEditora(){
        return $this->editora;
    }
    
    public function setEditora($editora){
        
        if(!ValidaDados::validaCamposNulos($editora)){
            throw new ExcessaoEditoraInvalida("A Editora do Livro nao pode ser nula!");
        }else{
            $this->editora = $editora;
        }
    }
    
    public function getEstado() {   
        return $this->estado;
    }
   
    public function setEstado($estado){
        $this->estado = $estado;
    }
    
//    public function salvaLivro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao, $id_dono){
//        if(empty($venda) && empty($troca)){
//            $venda = "venda";
//            $troca = "troca";
//        }
//
//        try{
//            $livro = new Livro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao);
//        }catch(Exception $e){
//            print"<script>alert('".$e->getMessage()."')</script>";
            
//<!--<script language = "Javascript">
//                    window.location="http://localhost/SeboEletronicov2.0/Visao/cadastrarLivro.php";
//                </script>-->
            
//            
//            exit;    
//        }
//        return LivroDao::salvaLivro($livro->getTitulo(),$livro->getAutor(),$livro->getGenero(),$livro->getEdicao(), 
//                $livro->getEditora(), $livro->getVenda(),$livro->getTroca(),$livro->getEstado(), 
//                $livro->getDescricao(), $id_dono);
//    }
//    
//    public function pesquisaLivro($titulo, $estadoNovo, $estadoUsado, $disponibilidadeVenda, $disponibilidadeTroca){
//        return LivroDao::pesquisaLivro($titulo, $estadoNovo, $estadoUsado, $disponibilidadeVenda, $disponibilidadeTroca);
//    }
//    
//    public function getLivroById($id){
//        return LivroDao::getLivroById($id);
//    }
//    
//    public function deletaLivro($titulo){
//        return LivroDao::deletaLivro($titulo);
//    }
//    
//    public function alteraLivro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao, $id, $id_usuario){
//        if(empty($venda) && empty($troca)){
//            $venda = "venda";
//            $troca = "troca";
//        }
//        $livro = new Livro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao);
//        return LivroDao::alteraLivro($livro->getTitulo(),$livro->getAutor(),$livro->getGenero(),$livro->getEdicao(), $livro->getEditora(), 
//                $livro->getVenda(),$livro->getTroca(),$livro->getEstado(), $livro->getDescricao(),$id, $id_usuario);
//    }
//
    
}
?>
