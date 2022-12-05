<?php
    class crud{
        private $conn;

        public function __construct(){
            $this->conn=new mysqli("localhost","root","","shop");
        }

        public function common_create($table,$data){
            $insert_id=0;
            if(is_array($data)){
                $sql="insert into $table set ";
                foreach($data as $col=>$val){
                    $sql.="$col='$val',";
                }
                $sql=rtrim($sql,',');
                $result=$this->conn->query($sql);
                if($result){
                    $insert_id=$this->conn->insert_id;
                    $error=false;
                    $msg= "Data saved";
                }else{
                    $error=true;
                    $msg= $this->conn->error;
                }
            }else{
                $error=true;
                $msg="Data must be array";
            }

            return array("error"=>$error,"msg"=>$msg,"insert_id"=>$insert_id);
        }

        public function common_update($table,$data,$where){
            $affected_rows=0;
            if(is_array($data)){
                $sql="update $table set ";
                foreach($data as $col=>$val){
                    $sql.="$col='$val',";
                }
                $sql=rtrim($sql,',');

                if($where){
                    $sql.=" where ";
                    foreach($where as $col=>$val){
                        $sql.="$col = '$val' and ";
                    }
                    $sql=rtrim($sql,'and ');
                }
                
                $result=$this->conn->query($sql);
                if($result){
                    $affected_rows=$this->conn->affected_rows;
                    $error=false;
                    $msg= "Data saved";
                }else{
                    $error=true;
                    $msg= $this->conn->error;
                }
            }else{
                $error=true;
                $msg="Data must be array";
            }

            return array("error"=>$error,"msg"=>$msg,"affected_rows"=>$affected_rows);
        }

        public function common_delete($table,$where){
            $affected_rows=0;
            if(is_array($where)){
                $sql="delete from $table ";
                $sql.=" where ";
                foreach($where as $col=>$val){
                    $sql.="$col = '$val' and ";
                }
                $sql=rtrim($sql,'and ');
                
                $result=$this->conn->query($sql);
                if($result){
                    $affected_rows=$this->conn->affected_rows;
                    $error=false;
                    $msg= "Data deleted";
                }else{
                    $error=true;
                    $msg= $this->conn->error;
                }
            }else{
                $error=true;
                $msg="condition must be array";
            }

            return array("error"=>$error,"msg"=>$msg,"affected_rows"=>$affected_rows);
        }

        public function common_select($table,$fields="*",$where=false,$order=false,$sort="ASC",$offset=false,$limit=false){
            $data=array();
            $sql="select $fields from $table";
            if($where){
                $sql.=" where ";
                foreach($where as $col=>$val){
                    $sql.="$col = '$val' and ";
                }
                $sql=rtrim($sql,'and ');
            }
            if($order){
                $sql.=" order by $order $sort";
            }
            if($offset){
                $sql.=" limit $limit, $offset";
            }
            $result=$this->conn->query($sql);
            if($result){
                if($result->num_rows > 0){
                    while($rs=$result->fetch_object()){
                        $data[]=$rs;
                    }
                    
                    $error=false;
                    $msg= $result->num_rows." data found";
                }else{
                    $error=true;
                    $msg="No data found";
                }
            }else{
                $error=true;
                $msg= $this->conn->error;
            }
            return array("error"=>$error,"msg"=>$msg,"data"=>$data);
        }
        public function common_select_single($table,$fields="*",$where=false,$order=false,$sort="ASC",$offset=false,$limit=false){
            $data=array();
            $sql="select $fields from $table";
            if($where){
                $sql.=" where ";
                foreach($where as $col=>$val){
                    $sql.="$col = '$val' and ";
                }
                $sql=rtrim($sql,'and ');
            }
            if($order){
                $sql.=" order by $order $sort";
            }
            if($offset){
                $sql.=" limit $limit, $offset";
            }
            $result=$this->conn->query($sql);
            if($result){
                if($result->num_rows > 0){
                    while($rs=$result->fetch_object()){
                        $data=$rs;
                    }
                    $error=false;
                    $msg= $result->num_rows." data found";
                }else{
                    $error=true;
                    $msg="No data found";
                }
            }else{
                $error=true;
                $msg= $this->conn->error;
            }
            return array("error"=>$error,"msg"=>$msg,"data"=>$data);
        }

        public function common_query($sql){
            $data=array();
            $result=$this->conn->query($sql);
            if($result){
                if($result->num_rows > 0){
                    while($rs=$result->fetch_object()){
                        $data[]=$rs;
                    }
                    $error=false;
                    $msg= $result->num_rows." data found";
                }else{
                    $error=true;
                    $msg="No data found";
                }
                
            }else{
                $error=true;
                $msg= $this->conn->error;
            }
            return array("error"=>$error,"msg"=>$msg,"data"=>$data);
        }

    }