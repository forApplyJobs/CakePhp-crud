
<div class="row">
    <aside class="col-md-2">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cvlist->id],
                [
                    'confirm' => __('Are you sure you want to delete # {0}?', $cvlist->id), 
                    'class' => 'btn btn-danger btn-lg text-light' // btn-lg ve text-light sınıfları eklendi
                ]
            ) ?>

            <?= $this->Html->link(
                __('List Cvlist'), 
                ['action' => 'index'], 
                ['class' => 'btn btn-secondary btn-lg text-light'] // btn-lg ve text-light sınıfları eklendi
            ) ?>


    </aside>
    <div class="col-md-10">
        <div class="cvlist form content">
            <?= $this->Form->create($cvlist) ?>
            <fieldset>
                <h1><?= __('Edit CV') ?></h1>
                <?php
                    echo $this->Form->control('title', ['class' => 'form-control']);
                    echo $this->Form->control('description', ['class' => 'form-control']);
                    
                    
                    
                ?>
                <h1>Information</h1>
                <?php
                if ($cvlist->info) {
                    echo $this->Form->control('info.header', ['value' => $cvlist->info->header, 'class' => 'form-control']);
                    echo $this->Form->control('info.description', ['value' => $cvlist->info->description, 'class' => 'form-control']);
                } else {
                    // $cvlist->info null ise veya özelliklere sahip değilse, varsayılan değerlerle form kontrollerini oluşturabilirsiniz veya bir hata mesajı gösterebilirsiniz
                    echo $this->Form->control('info.header', ['class' => 'form-control']);
                    echo $this->Form->control('info.description', ['class' => 'form-control']);
                }
                ?>

                <h1><?= __('Experiences') ?></h1>
                <div id="experience-fields">
                    <?php foreach ($cvlist->experiences as $index => $experience): ?>
                        <fieldset class="experience">
                            <legend><?= __('Experience') ?></legend>
                            <?= $this->Form->control("experiences.$index.id", ['type' => 'hidden']) ?>
                            <?= $this->Form->control("experiences.$index.title", ['class' => 'form-control']) ?>
                            <?= $this->Form->control("experiences.$index.description", ['class' => 'form-control']) ?>
                            <button type="button" class="btn btn-danger mt-2 remove-experience">Remove Experience</button>
                        </fieldset>
                    <?php endforeach; ?>
                </div>
                <button type="button" id="add-experience" class="btn btn-success mt-3">Add Experience</button>
                
                <h1><?= __('Projects') ?></h1>
                <div id="project-fields">
                    <?php foreach ($cvlist->projects as $index => $project): ?>
                        <fieldset class="project">
                            <legend><?= __('Project') ?></legend>
                            <?= $this->Form->control("projects.$index.id", ['type' => 'hidden']) ?>
                            <?= $this->Form->control("projects.$index.title", ['class' => 'form-control']) ?>
                            <?= $this->Form->control("projects.$index.description", ['class' => 'form-control']) ?>
                            <button type="button" class="btn btn-danger mt-2 remove-project">Remove Project</button>
                        </fieldset>
                    <?php endforeach; ?>
                </div>
                <button type="button" id="add-project" class="btn btn-success mt-3">Add Project</button>

            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary mt-3']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const addExperienceButton = document.getElementById('add-experience');
    const experienceFields = document.getElementById('experience-fields');
    let experienceCount = <?= count($cvlist->experiences) ?>;

    addExperienceButton.addEventListener('click', function() {
        const newExperience = `
            <fieldset class="experience">
                <legend>Experience ${experienceCount + 1}</legend>
                <div class="mb-3">
                    <label for="cvlist-experiences-${experienceCount}-title" class="form-label">Title</label>
                    <input type="text" name="experiences[${experienceCount}][title]" class="form-control" required />
                </div>
                <div class="mb-3">
                    <label for="cvlist-experiences-${experienceCount}-description" class="form-label">Description</label>
                    <textarea name="experiences[${experienceCount}][description]" class="form-control" required></textarea>
                </div>
                <button type="button" class="btn btn-danger mt-2 remove-experience">Remove Experience</button>
            </fieldset>
        `;
        experienceFields.insertAdjacentHTML('beforeend', newExperience);
        experienceCount++;
    });

    const addProjectButton = document.getElementById('add-project');
    const projectFields = document.getElementById('project-fields');
    let projectCount = <?= count($cvlist->projects) ?>;

    addProjectButton.addEventListener('click', function() {
        const newProject = `
            <fieldset class="project">
                <legend>Project ${projectCount + 1}</legend>
                <div class="mb-3">
                    <label for="cvlist-projects-${projectCount}-title" class="form-label">Title</label>
                    <input type="text" name="projects[${projectCount}][title]" class="form-control" required />
                </div>
                <div class="mb-3">
                    <label for="cvlist-projects-${projectCount}-description" class="form-label">Description</label>
                    <textarea name="projects[${projectCount}][description]" class="form-control" required></textarea>
                </div>
                <button type="button" class="btn btn-danger mt-2 remove-project">Remove Project</button>
            </fieldset>
        `;
        projectFields.insertAdjacentHTML('beforeend', newProject);
        projectCount++;
    });

    const removeExperienceButtons = document.querySelectorAll('.remove-experience');
    removeExperienceButtons.forEach(button => {
        button.addEventListener('click', function() {
            this.parentElement.remove();
            // Deneyimin kaldırılması için ilgili gizli alanın (hidden field) değerini null yap
            const experienceIdField = this.parentElement.querySelector('input[type="hidden"]');
            experienceIdField.value = null;
        });
    });

    const removeProjectButtons = document.querySelectorAll('.remove-project');
    removeProjectButtons.forEach(button => {
        button.addEventListener('click', function() {
            this.parentElement.remove();
            // Projeyi kaldırılması için ilgili gizli alanın (hidden field) değerini null yap
            const projectIdField = this.parentElement.querySelector('input[type="hidden"]');
            projectIdField.value = null;
        });
    });

    // Form submit işlemi sonrası verilerin konsola yazdırılması
    const form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Formun normal gönderimini engelle
        const formData = new FormData(form);
        for (const [name, value] of formData) {
            console.log(`${name}: ${value}`);
        }
        // Form verilerini sunucuya göndermek için burada bir AJAX isteği yapabilirsiniz
    });
});
</script>
