<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IEEE CV</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <!-- Actions -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Actions</h4>
                        <ul class="list-group">
                        <td class="actions">
                            <li class="list-group-item"><?= $this->Html->link(__('View'), ['action' => 'view', $cvlist->id], ['class' => 'btn btn-primary']) ?></li>
                            <li class="list-group-item"><?= $this->Html->link(__('Edit'), ['action' => 'edit', $cvlist->id], ['class' => 'btn btn-secondary']) ?></li>
                            <li class="list-group-item"><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cvlist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cvlist->id), 'class' => 'btn btn-danger']) ?></li>
                        </td>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <!-- CV Content -->
                <div class="card" id="cv-content">
                    <div class="card-body">
                        <h3 class="card-title"><?= h($cvlist->title) ?></h3>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Title</th>
                                    <td><?= h($cvlist->title) ?></td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td><?= h($cvlist->description) ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- Information -->
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Information</h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?= h($cvlist->info->header) ?></h6>
                                <p class="card-text"><?= h($cvlist->info->description) ?></p>
                            </div>
                        </div>
                        <!-- Experiences -->
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Experiences</h5>
                                <ul class="list-group">
                                    <?php foreach ($cvlist->experiences as $experience): ?>
                                        <li class="list-group-item"><?= h($experience->title) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <!-- Projects -->
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Projects</h5>
                                <ul class="list-group">
                                    <?php foreach ($cvlist->projects as $project): ?>
                                        <li class="list-group-item"><?= h($project->title) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button id="downloadPdf" class="btn btn-primary">Download as PDF</button>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#downloadPdf').click(function() {


            });
        });
    </script>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Custom JavaScript -->
    <!-- <script>
        $(document).ready(function() {
            $('#downloadPdf').click(function() {
                // CV içeriğini al
                var htmlContent = $('#cv-content').html();
                
                // FormData nesnesi oluştur ve HTML içeriğini ekleyerek POST isteği yap
                var formData = new FormData();
                formData.append('htmlContent', htmlContent);
                
                // POST isteği yap ve PDF olarak indir
                $.ajax({
                    url: '/cvlist/generatePdf',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // PDF dosyasını indir
                        var blob = new Blob([response], { type: 'application/pdf' });
                        var link = document.createElement('a');
                        link.href = window.URL.createObjectURL(blob);
                        link.download = 'cv.pdf';
                        link.click();
                    },
                    error: function() {
                        // Hata durumunda bildirim göster
                        alert('Failed to generate PDF');
                    }
                });
            });
        });
    </script> -->
</body>
</html>
    <!-- <script>
        var button = document.getElementById('downloadPdf'); // butonId, HTML'de butonunuzun id'siyle değiştirilmelidir
        // Butona tıklandığında bir olay dinleyici ekleme
        button.addEventListener('click', function() {
            // POST isteği için gerekli verileri hazırlama
            var postData = {
                name: 'John Doe',
                age: 30,
                email: 'john@example.com'
                // İsteğin gövdesine eklemek istediğiniz diğer verileri buraya ekleyebilirsiniz
            };

            // POST isteği yapma
            fetch('/cvlist/generatePdf', {
                method: 'POST',
                headers: {

                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(postData) // Verileri JSON formatına dönüştürme
            })
            .then(response => {
                // İstek başarılıysa buraya gelir
                // Yanıtla yapmak istediğiniz işlemi burada gerçekleştirin
            })
            .catch(error => {
                // Hata durumunda buraya gelir
                console.error('Error:', error);
            });
        });
    </script> -->
    <!-- <script>
        $.post("/cvlist/generatePdf", 
        {
            id: 1, 
            title: "What is AJAX", 
            body: "AJAX stands for Asynchronous JavaScript..."
        },
        function(data, status) {
            if(status === "success") {
                console.log("Post successfully created!")
            }
        },
        "json")
    </script> -->
</body>
</html>
