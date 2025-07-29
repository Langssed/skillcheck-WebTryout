<script>
    document.addEventListener('DOMContentLoaded', function () {
        const levelSelect = document.getElementById('level');
        const subjectSelect = document.getElementById('subject');
        const categorySelect = document.getElementById('category');

        levelSelect.addEventListener('change', function () {
            const levelId = this.value;
            subjectSelect.innerHTML = '<option value="">-- Pilih Mapel --</option>';
            categorySelect.innerHTML = '<option value="">-- Pilih Kategori --</option>';
            categorySelect.disabled = true;

            if (levelId) {
                fetch(`/api/subjects/${levelId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(subject => {
                            subjectSelect.innerHTML += `<option value="${subject.id}">${subject.name}</option>`;
                        });
                        subjectSelect.disabled = false;
                    });
            } else {
                subjectSelect.disabled = true;
            }
        });

        subjectSelect.addEventListener('change', function () {
            const subjectId = this.value;
            categorySelect.innerHTML = '<option value="">-- Pilih Kategori --</option>';

            if (subjectId) {
                fetch(`/api/categories/${subjectId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(category => {
                            categorySelect.innerHTML += `<option value="${category.id}">${category.name}</option>`;
                        });
                        categorySelect.disabled = false;
                    });
            } else {
                categorySelect.disabled = true;
            }
        });

        //edit
        // const editLevelSelect = document.getElementById('level_edit');
        // const editSubjectSelect = document.getElementById('subject_edit');
        // const editCategorySelect = document.getElementById('category_edit');

        // function getSelectedAttribute(el) {
        //     return el?.getAttribute('data-selected') || '';
        // }

        // function populateSubjectsEdit(levelId, selectedId = '') {
        //     if (!editSubjectSelect || !editCategorySelect) return;

        //     editSubjectSelect.innerHTML = '<option value="">-- Pilih Mapel --</option>';
        //     editCategorySelect.innerHTML = '<option value="">-- Pilih Kategori --</option>';
        //     editSubjectSelect.disabled = true;
        //     editCategorySelect.disabled = true;

        //     if (!levelId) return;

        //     fetch(`/api/subjects/${levelId}`)
        //         .then(res => res.json())
        //         .then(subjects => {
        //             subjects.forEach(subject => {
        //                 const selected = subject.id == selectedId ? 'selected' : '';
        //                 editSubjectSelect.innerHTML += `<option value="${subject.id}" ${selected}>${subject.name}</option>`;
        //             });

        //             editSubjectSelect.disabled = false;

        //             if (selectedId) {
        //                 populateCategoriesEdit(selectedId, getSelectedAttribute(editCategorySelect));
        //             }
        //         });
        // }

        // function populateCategoriesEdit(subjectId, selectedId = '') {
        //     editCategorySelect.innerHTML = '<option value="">-- Pilih Kategori --</option>';
        //     editCategorySelect.disabled = true;

        //     if (!subjectId) return;

        //     fetch(`/api/categories/${subjectId}`)
        //         .then(res => res.json())
        //         .then(categories => {
        //             categories.forEach(category => {
        //                 const selected = category.id == selectedId ? 'selected' : '';
        //                 editCategorySelect.innerHTML += `<option value="${category.id}" ${selected}>${category.name}</option>`;
        //             });

        //             editCategorySelect.disabled = false;
        //         });
        // }

        // // Saat modal ditampilkan
        // $('#editModal').on('shown.bs.modal', function () {
        //     const levelId = editLevelSelect?.value;
        //     const selectedSubjectId = getSelectedAttribute(editSubjectSelect);
        //     const selectedCategoryId = getSelectedAttribute(editCategorySelect);

        //     if (levelId) {
        //         populateSubjectsEdit(levelId, selectedSubjectId);
        //     }

        //     if (selectedSubjectId) {
        //         populateCategoriesEdit(selectedSubjectId, selectedCategoryId);
        //     }
        // });

        // // Saat Level berubah
        // editLevelSelect?.addEventListener('change', function () {
        //     editSubjectSelect.setAttribute('data-selected', '');
        //     editCategorySelect.setAttribute('data-selected', '');
        //     populateSubjectsEdit(this.value);
        // });

        // // Saat Mapel berubah
        // editSubjectSelect?.addEventListener('change', function () {
        //     editCategorySelect.setAttribute('data-selected', '');
        //     populateCategoriesEdit(this.value);
        // });

        // // Jika Livewire memproses data ulang (edit dipanggil)
        // document.addEventListener('livewire:load', function () {
        //     Livewire.hook('message.processed', () => {
        //         const isModalOpen = document.getElementById('editModal')?.classList.contains('show');
        //         if (!isModalOpen) return;

        //         const levelId = editLevelSelect?.value;
        //         const selectedSubjectId = getSelectedAttribute(editSubjectSelect);
        //         const selectedCategoryId = getSelectedAttribute(editCategorySelect);

        //         if (levelId) {
        //             populateSubjectsEdit(levelId, selectedSubjectId);
        //             if (selectedSubjectId) {
        //                 populateCategoriesEdit(selectedSubjectId, selectedCategoryId);
        //             }
        //         }
        //     });
        // });
    });
</script>