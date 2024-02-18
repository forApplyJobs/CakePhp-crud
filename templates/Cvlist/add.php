<!-- src/Template/Cvlist/add.php -->

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Cvlist'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="cvlist form content">
            <?= $this->Form->create($cvlist) ?>
            <fieldset>
                <legend><?= __('Add Cvlist') ?></legend>
                <?php
                    
                    echo $this->Form->control('title',['label' => 'CV Title']);
                    echo $this->Form->control('description',['label' => 'CV Description']);
                    echo $this->Form->control('info_header', ['label' => 'Information Header']);
                    echo $this->Form->control('info_description', ['label' => 'Information Description']);
                ?>

                <!-- Experience fields -->
                <div id="experience-fields">
                    <!-- Experience fields will be added dynamically here -->
                </div>
                <button type="button" id="add-experience">Add Experience</button>

                <!-- Project fields -->
                <div id="project-fields">
                    <!-- Project fields will be added dynamically here -->
                </div>
                <button type="button" id="add-project">Add Project</button>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addExperienceButton = document.getElementById('add-experience');
        const experienceFields = document.getElementById('experience-fields');
        let experienceCount = 0;

        addExperienceButton.addEventListener('click', function() {
            const newExperience = `
                <fieldset>
                    <legend>Experience ${experienceCount + 1}</legend>
                    <div>
                        <label for="cvlist-experiences-${experienceCount}-title">Title</label>
                        <input type="text" name="experiences[${experienceCount}][title]" required />
                    </div>
                    <div>
                        <label for="cvlist-experiences-${experienceCount}-description">Description</label>
                        <textarea name="experiences[${experienceCount}][description]" required></textarea>
                    </div>
                </fieldset>
            `;
            experienceFields.insertAdjacentHTML('beforeend', newExperience);
            experienceCount++;
        });

        const addProjectButton = document.getElementById('add-project');
        const projectFields = document.getElementById('project-fields');
        let projectCount = 0;

        addProjectButton.addEventListener('click', function() {
            const newProject = `
                <fieldset>
                    <legend>Project ${projectCount + 1}</legend>
                    <div>
                        <label for="cvlist-projects-${projectCount}-title">Title</label>
                        <input type="text" name="projects[${projectCount}][title]" required />
                    </div>
                    <div>
                        <label for="cvlist-projects-${projectCount}-description">Description</label>
                        <textarea name="projects[${projectCount}][description]" required></textarea>
                    </div>
                </fieldset>
            `;
            projectFields.insertAdjacentHTML('beforeend', newProject);
            projectCount++;
        });
    });
</script>
