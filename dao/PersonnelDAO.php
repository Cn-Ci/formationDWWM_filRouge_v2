<?php 
    require_once('../exception/DAOException.php');
    require_once('ConnectionMysqliDAO.php');
    require_once('../interface/interfaceDAO.php');
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    class PersonnelDAO  {
        public function add(Personnel $personnel) :Void {
             $nom    = $personnel->getNom(); 
             $prenom = $personnel->getPrenom();
             $emploi    = $personnel->getEmploi();
             $desc   = $personnel->getDescription();
             $photo  = $personnel->getPhoto();
             $fb     = $personnel->getFbLink() ;
             $tw     = $personnel->getTwLink() ;
             $li     = $personnel->getLiLink();
            
            //* CONNECT DB
            $db = ConnectionMysqliDAO::connect();   

            //* ADD   
            try {
                $addRequest = $db->prepare("INSERT INTO personnel  VALUES (NULL, :nom, :prenom, :emploi, :description, :photo, :fb, :tw, :li)");
                $addRequest->execute(array(
                    ":nom"         => $nom,
                    ":prenom"      => $prenom,
                    ":emploi"      => $emploi,
                    ":description" => $desc,
                    ":photo"       => $photo,
                    ":fb"          => $fb,
                    ":tw"          => $tw,
                    ":li"          => $li));
            } catch (PDOException $DAOException) {
                throw new DAOException($DAOException->getMessage(), $DAOException->getCode());
            } finally {
                
            }
        }
         
        public function searchBy(String $id) :?Personnel {
            //* CONNECT DB
            $db = ConnectionMysqliDAO::connect();
            //* REQUETE SQL SEARCH BY ID
            try {
                $stmt   = $db->prepare("SELECT * FROM personnel WHERE id= :id");
                $stmt->bindParam(":id" , $id);
                $stmt->execute();
                $data   = $stmt->fetch();

                $personnel = new Personnel();
                $personnel->setId($data['id'])->setNom($data['nom'])->setPrenom($data['prenom'])->setEmploi($data['emploi'])->setDescription($data['description'])->setPhoto($data['photo'])->setFbLink($data['facebookLink'])->setTwLink($data['twitterLink'])->setLiLink($data['linkedinLink']);

                $stmt->closeCursor();

                return $personnel;
            } catch (PDOException $DaoException) {
                throw new DAOException($DaoException->getMessage(), $DaoException->getCode());
            } finally {
                
    
                
            }
        }

        public function searchAllPersonnel() :?Array {
            // CONNECTION DB
            $db = ConnectionMysqliDAO :: connect();

            //REQUETE SQL SEARCHALL
            try{
                $query    = $db->prepare("SELECT * FROM personnel ");
                $query    ->execute();
                $data         = $query->fetchAll();
                
                $i=0;
                foreach($data as $key=>$value){
                    
                    $personnel= new Personnel();
                    $personnel->setId($data[$i]['id'])->setNom($data[$i]['nom'])->setPrenom($data[$i]['prenom'])->setEmploi($data[$i]['emploi'])->setDescription($data[$i]['description'])->setPhoto($data[$i]['photo'])->setFbLink($data[$i]['facebookLink'])->setTwLink($data[$i]['twitterLink'])->setLiLink($data[$i]['linkedinLink']);
                    $tableauPersonnels[$i]=$personnel;
                    $i++;
                }

            }catch (PDOException $DaoException){
                throw new DAOException($DaoException->getMessage(), $DaoException->getCOde());
            }finally{
                
                $query->closeCursor();

                return $tableauPersonnels;
            }
        }

        public function updatePersonnelDAO(Personnel $personnel){
            $nom    = $personnel->getNom();
            $prenom = $personnel->getPrenom();
            $emp    = $personnel->getEmploi();
            $desc   = $personnel->getDescription();
            $photo  = $personnel->getPhoto();
            $fb     = $personnel->getFbLink();
            $tw     = $personnel->getTwLink();
            $li     = $personnel->getLiLink();
            $id     = $personnel->getId();
            
            //* CONNECT DB
            $db = ConnectionMysqliDAO::connect();   

            //* Modification  
            try {
                $updateRequest = $db->prepare("UPDATE personnel SET nom = :nom, prenom= :prenom, emploi = :emp, description = :description, photo = :photo, facebooklink= :fb, twitterlink= :tw, linkedinlink=:li WHERE id = :id" );
                $updateRequest->execute(array(
                    ":nom"         => $nom,
                    ":prenom"      => $prenom,
                    ":emp"         => $emp,
                    ":description" => $desc,
                    ":photo"       => $photo,
                    ":fb"          => $fb,
                    ":tw"          => $tw,
                    ":li"          => $li,
                    ":id"          => $id));
            } catch (PDOException $DaoException) {
                throw new DAOException($DaoException->getMessage(), $DaoException->getCode());
            } finally {
                
            }
        }
        public function deletePersonnelDAO(int $id){
            //* CONNECT DB
            $db = ConnectionMysqliDAO::connect();   

            //* ADD   
            try {
                $deleteRequest = $db->prepare("DELETE * FROM personnel WHERE id = $id");
                $deleteRequest->execute();               
            } catch (PDOException $DaoException) {
                throw new DAOException($DaoException->getMessage(), $DaoException->getCode());
            } finally {
                
            }
        }
    }
?> 