<?php

declare(strict_types=1);


// src/Controller/CvlistsController.php
// src/Controller/CvlistsController.php
namespace App\Controller;



// 3. Kütüphaneyi kullanarak PDF oluşturun.

use App\Controller\AppController;

require_once 'C:\xampp\htdocs\oven\my_app_name3\vendor\autoload.php';
use mPDF;
use mikehaertl\wkhtmlto\Pdf;
use Cake\Http\Exception\NotFoundException;
use Cake\Utility\Text;

class CvlistController extends AppController
{

    public function index()
    {
        $cvlists = $this->paginate($this->Cvlist);
        $this->set(compact('cvlists'));
    }

    public function add()
{
    $cvlist = $this->Cvlist->newEmptyEntity();
    if ($this->request->is('post')) {
        $cvlist = $this->Cvlist->patchEntity($cvlist, $this->request->getData());
        if ($this->Cvlist->save($cvlist)) {
            // İlk olarak CV listesini kaydediyoruz

            // Daha sonra info oluşturuyoruz
            $info = $this->Cvlist->Infos->newEntity([
                'header' => $this->request->getData('info_header'), // Burada info header'ını alıyoruz
                'description' => $this->request->getData('info_description') // Burada info description'ını alıyoruz
            ]);

            // Oluşturduğumuz info'yu CV listesine bağlayıp kaydediyoruz
            $cvlist->info = $info;

            // Deneyimleri kaydet
            $experiencesData = $this->request->getData('experiences');
            if (!empty($experiencesData)) {
                $experiences = $this->Cvlist->Experiences->newEntities($experiencesData);
                foreach ($experiences as $experience) {
                    $experience->cvlist_id = $cvlist->id;
                }
                $this->Cvlist->Experiences->saveMany($experiences);
            }

            // Projeleri kaydet
            $projectsData = $this->request->getData('projects');
            if (!empty($projectsData)) {
                $projects = $this->Cvlist->Projects->newEntities($projectsData);
                foreach ($projects as $project) {
                    $project->cvlist_id = $cvlist->id;
                }
                $this->Cvlist->Projects->saveMany($projects);
            }

            if ($this->Cvlist->save($cvlist)) {
                $this->Flash->success(__('The cvlist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
        }
        $this->Flash->error(__('The cvlist could not be saved. Please, try again.'));
    }
    $this->set(compact('cvlist'));
}

public function edit($id = null)
{
    $cvlist = $this->Cvlist->get($id, [
        'contain' => ['Experiences', 'Projects','Infos']
    ]);

    if ($this->request->is(['patch', 'post', 'put'])) {
        $requestData = $this->request->getData();
        //update
       
       // $requestData'dan güncellenecek bilgileri alın
        $newInfoData = $requestData['info'];

        // CVList'e bağlı Info girişini alın
        $existingInfo = $cvlist->info;

        // Mevcut Info girişi yoksa hata gösterin veya yeni bir tane oluşturun
        if (!$existingInfo) {
            // Hata gösterme veya varsayılan bir Info girişi oluşturma
            // ...
        } else {
            // Mevcut Info girişi varsa, güncelleyin
            $existingInfo->header = $newInfoData['header'];
            $existingInfo->description = $newInfoData['description'];

            // Info girişini kaydedin
            if ($this->Cvlist->Infos->save($existingInfo)) {
                // Info başarıyla güncellendi
            } else {
                // Güncelleme başarısız oldu, hata mesajı gösterin veya işlemleri geri alın
            }
        }
        
        
        
        //update
        
        // Mevcut deneyimlerin ve projelerin güncellenmesi veya eklenmesi


        // Yeni eklenen deneyimlerin ve projelerin kaydedilmesi
        if(!empty($requestData['experiences'])){
            foreach ($requestData['experiences'] as $index => $requestDataExperience) {

                if (isset($requestDataExperience['id'])){
                    $experienceId = $requestDataExperience['id'];
    
                    foreach ($cvlist->experiences as $index => $experience) {
                        if ($experience->id == $experienceId) {
                            $cvlist->experiences[$index]->title = $requestDataExperience['title'];
                            $cvlist->experiences[$index]->description = $requestDataExperience['description'];
                            $this->Cvlist->Experiences->save($cvlist->experiences[$index]);
                
                            break;
                        }
                    }
                }
            }
            $newExperiencesData = array_filter($requestData['experiences'], function ($experience) {
                return empty($experience['id']);
            });
    
            $newExperiences = $this->Cvlist->Experiences->newEntities($newExperiencesData);
            foreach ($newExperiences as $experience) {
                $experience->cvlist_id = $cvlist->id;
            }
            $this->Cvlist->Experiences->saveMany($newExperiences);
            foreach ($cvlist->experiences as $index => $experience) {
                $experienceFound = false; // Başlangıçta deneyim bulunamadı olarak işaretlenir
                
                foreach ($requestData['experiences'] as $requestDataExperience) {
                    if ($requestDataExperience['id'] == $experience->id) {
                        // Deneyimin ID'si, istek verisindeki bir deneyimin ID'siyle eşleşti
                        $experienceFound = true;
                        break;
                    }
                }
                
                if (!$experienceFound) {
                    // Deneyim istek verisinde bulunamadı, bu yüzden silinmelidir
                    $this->Cvlist->Experiences->delete($experience);
                }
            }
        }else{
            foreach ($cvlist->experiences as $index => $experience) {
                $this->Cvlist->Experiences->delete($experience);
            }
        }

        
        
        
       if(!empty($requestData['projects'])){
            foreach ($requestData['projects'] as $index => $requestDataProject) {
                // Projenin id'sini al
                if (isset($requestDataProject['id'])){
                    $projectId = $requestDataProject['id'];
                
                // Projeyi bul ve güncelle
                foreach ($cvlist->projects as $index => $project) {
                    if ($project->id == $projectId) {
                        // Projeyi güncelle
                        $cvlist->projects[$index]->title = $requestDataProject['title'];
                        $cvlist->projects[$index]->description = $requestDataProject['description'];
                        
                        // Değişiklikleri kaydetmek için saveMany() veya saveAssociated() yöntemini kullanabilirsiniz
                        $this->Cvlist->Projects->save($cvlist->projects[$index]);
            
                        break;
                    }
                }
                }
                
            }
            $newProjectsData = array_filter($requestData['projects'], function ($project) {
                return empty($project['id']);
            });

            $newProjects = $this->Cvlist->Projects->newEntities($newProjectsData);
            foreach ($newProjects as $project) {
                $project->cvlist_id = $cvlist->id;
            }
            $this->Cvlist->Projects->saveMany($newProjects);
            foreach ($cvlist->projects as $index => $project) {
                $projectFound = false; // Başlangıçta proje bulunamadı olarak işaretlenir
                
                foreach ($requestData['projects'] as $requestDataProject) {
                    if ($requestDataProject['id'] == $project->id) {
                        // Projenin ID'si, istek verisindeki bir projenin ID'siyle eşleşti
                        $projectFound = true;
                        break;
                    }
                }
                
                if (!$projectFound) {
                    // Proje istek verisinde bulunamadı, bu yüzden silinmelidir
                    $this->Cvlist->Projects->delete($project);
                }
            }
       }else{
            foreach ($cvlist->projects as $index => $project) {
                $this->Cvlist->Projects->delete($project);
            }

       }



        if ($this->Cvlist->save($cvlist, ['associated' => false])) { // ilişkilendirme yapmadan kaydet
            $this->Flash->success(__('The cvlist has been saved.'));

            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The cvlist could not be saved. Please, try again.'));
    }

    $infos = $this->Cvlist->Infos->find('list', ['limit' => 200]);
    $this->set(compact('cvlist', 'infos'));
}



public function generatePdf()
{

    
    debug(json_decode(file_get_contents('php://input'), true));
    debug( $this->request->getData());
    debug($this->request);
    // Gelen HTML içeriğini alın
    $html = $this->request->getData('htmlContent');
    debug($this->request->getData('htmlContent'));
    $pdf = new Pdf($html);
    debug($pdf); 
    // PDF içeriğini bir değişkende saklayın
    $pdfContent = $pdf->toString();
    debug($pdfContent); 
    // PDF oluşturulduysa ve içeriği bir string ise HTTP yanıtına ekleyin
    if (is_string($pdfContent)) {
        $this->response = $this->response->withType('application/pdf')
                                         ->withStringBody($pdfContent);
    } else {
        // PDF oluşturulamadı, bir hata mesajı gönderebilirsiniz
        $this->response = $this->response->withStatus(500)
                                         ->withStringBody('PDF oluşturulamadı');
    }

    return $this->response;
}





// public function generatePdf()
// {
//     // Gelen HTML içeriğini alın
//     $html = $this->request->getData('htmlContent');
    
//     // Mpdf kütüphanesini kullanarak PDF oluşturun
//     $mpdf = new mPDF();
//     $mpdf->SetDisplayMode('real');
//     $mpdf->autoScriptToLang = true;
//     $mpdf->autoLangToFont = true;
//     $mpdf->WriteHTML($html);
    
//     // PDF içeriğini bir değişkende saklayın
//     $pdfContent = $mpdf->Output('', 'S');

//     // PDF içeriğini response'a ekleyin
//     $this->response = $this->response->withType('application/pdf')
//                                      ->withBody($pdfContent);

//     return $this->response;
// }


function htmlToPdf(){

    
}


public function delete($id = null)
{
   

    $this->request->allowMethod(['post', 'delete']);
    $cvlist = $this->Cvlist->get($id, [
        'contain' => ['Experiences', 'Projects']
    ]);

    
    // CV listesine bağlı deneyimleri ve projeleri sil
    foreach ($cvlist->experiences as $experience) {
        $this->Cvlist->Experiences->delete($experience);
    }

    foreach ($cvlist->projects as $project) {
        $this->Cvlist->Projects->delete($project);
    }

    // CV listesi silme
    if ($this->Cvlist->delete($cvlist)) {
        $this->Flash->success(__('The cvlist has been deleted.'));
    } else {
        $this->Flash->error(__('The cvlist could not be deleted. Please, try again.'));
    }

    return $this->redirect(['action' => 'index']);
}


    
    
    


    public function addInfo($cvlist_id)
    {
        $info = $this->Cvlist->Infos->newEmptyEntity();
        if ($this->request->is('post')) {
            $info = $this->Cvlist->Infos->patchEntity($info, $this->request->getData());
            $info->cvlist_id = $cvlist_id; // Assign the cvlist_id
            if ($this->Cvlist->Infos->save($info)) {
                $this->Flash->success(__('The info has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The info could not be saved. Please, try again.'));
        }
        $this->set(compact('info'));
    }
    public function view($id = null)
    {
        $cvlist = $this->Cvlist->get($id, [
            'contain' => ['Infos', 'Experiences', 'Projects']
        ]);
    
        $this->set(compact('cvlist'));
    }
}