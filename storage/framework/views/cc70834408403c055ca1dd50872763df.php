<?php $__env->startSection('title', 'Dashboard'); ?>


<?php $__env->startSection('content_header'); ?>


<style>


        .form-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background: #f8f9fa;
            border-radius: 8px;
        }
        
        .inclusions-item {
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            padding: 1rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .form-fields {
            flex: 1;
            display: flex;
            gap: 15px;
            align-items: center;
        }
        
        .field-group {
            flex: 1;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .field-group label {
            white-space: nowrap;
            margin: 0;
            min-width: 50px;
            font-weight: 500;
        }
        
        .field-group input {
            flex: 1;
        }
        
        .remove_button {
            background: #dc3545;
            border: none;
            border-radius: 4px;
            padding: 8px 12px;
            color: white;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s;
            white-space: nowrap;
            min-width: 80px;
            text-align: center;
        }
        
        .remove_button:hover {
            background: #c82333;
            color: white;
            text-decoration: none;
        }
        
        .remove_button img {
            width: 16px;
            height: 16px;
            filter: invert(1);
        }
        
        .add-more-btn {
            background: #28a745;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 1rem;
        }
        
        .add-more-btn:hover {
            background: #218838;
        }
        
        .form-title {
            color: #495057;
            margin-bottom: 2rem;
            text-align: center;
        }
        
        .field-counter {
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }
   
</style>


    <h1>Course</h1>
    



<?php $__env->stopSection(); ?>




<?php $__env->startSection('content'); ?>

<style>
    a.brand-link img {
    display: none;
}
</style>


<div class="card card-info">





<div class="card-header">







<h3 class="card-title">Create Course</h3>







</div>


<form action="<?php echo e(route('course.store')); ?>" method="POST" enctype="multipart/form-data" id="myForm">







<?php echo csrf_field(); ?>




                <div class="card-body">







                <div class="form-group row">

                    <label for="" class="col-sm-2 col-form-label">Title</label>

                    <div class="col-sm-10">


                      <input type="text" name="title" class="form-control" required>

                        </div>

                </div>  


                <div class="form-group row">
    <label for="duration" class="col-sm-2 col-form-label">Duration (days)</label>
    <div class="col-sm-10">
        <input type="number" name="duration" class="form-control" id="duration">
    </div>
</div>



 <div class="form-group row">
    <label for="fees" class="col-sm-2 col-form-label">Fees</label>
    <div class="col-sm-10">
        <input type="text" name="fees" class="form-control" id="fees">
    </div>
</div>


               


                <div class="form-group row">





                    <label for="" class="col-sm-2 col-form-label">Description</label>


                    <div class="col-sm-10">


                        <textarea id="editor" class="form-control" style="height:150px" name="description"></textarea>


                    </div>


                </div>




                <?php /*
                <div class="form-group row">
                 <div class="col-xs-12 col-sm-3 form-group">
                  <strong>Add More: Videos</strong>
                               <a href="javascript:void(0);" class="add_button1" title="Add field">
                    <img src="{{asset('vendor/adminlte/dist/img/add-icon.png')}}"/></a>
               
                             </div>
                  <div class="col-xs-12 col-sm-9 form-group field_wrapper1">
        
                    <br /><br />
                </div>
                </div>  
                */ ?>



                <div class="form-group row">
                 <div class="col-xs-12 col-sm-2 form-group">
                  <strong>Add Videos</strong>
                </div>

                <div class="col-xs-12 col-sm-10 form-group">
                <div id="inclusionsContainer">
                    <!-- Initial form field -->
                    <div class="Inclusions inclusions-item" data-index="0">

                        <input type="hidden" name="id[]">
                        
                        <div class="form-fields">
                            <div class="field-group">
                                <label>Title:</label>
                                <input class="form-control" type="text" name="c_title[]" placeholder="Enter title">
                            </div>
                            
                            <div class="field-group">
                                <label>Vimeo ID:</label>
                                <input class="form-control" type="text" name="video[]" placeholder="Enter Vimeo ID Here">
                            </div>
                            
                        </div>
                        
                        <a href="javascript:void(0);" class="remove_button" title="Remove field" style="display: none;">
                            Delete
                        </a>
                    </div>
                </div>


                <button type="button" class="add-more-btn" id="addMoreBtn">
                    + Add More
                </button>



                </div>


                </div>
                
               




                


                <div class="form-group row">

                <label for="" class="col-sm-2 col-form-label">Add Image (940 x 627)</label>


                <div class="col-sm-10">


                <input type="file" name="image" class="" id="typ_name" onChange="Filevalidation()" >



                    </div>



                </div>  


     
<?php /*
<div class="form-group row">
    <label for="access_start" class="col-sm-2 col-form-label">Access Start</label>
    <div class="col-sm-10">
        <input type="date" name="access_start" class="form-control" id="access_start">
    </div>
</div>

<div class="form-group row">
    <label for="access_end" class="col-sm-2 col-form-label">Access End</label>
    <div class="col-sm-10">
        <input type="date" name="access_end" class="form-control" id="access_end">
    </div>
</div>

*/ ?>

                
    <div class="form-group row">

                    <label for="" class="col-sm-2 col-form-label">Meta Title</label>

                    <div class="col-sm-10">


                      <input type="text" name="meta_title" class="form-control">

                        </div>

                </div>  



                 <div class="form-group row">

                    <label for="" class="col-sm-2 col-form-label">Meta Description</label>

                    <div class="col-sm-10">


                      <input type="text" name="meta_desc" class="form-control">

                        </div>

                </div>  




                 <div class="form-group row">

                    <label for="" class="col-sm-2 col-form-label">Meta Keyword</label>

                    <div class="col-sm-10">


                      <input type="text" name="meta_key" class="form-control">

                        </div>

                </div>  





</div>





                <!-- /.card-body -->








                <div class="card-footer">







                  <button type="submit" class="btn btn-primary">Submit</button>







                  <button type="button" class="btn btn-danger" onclick="window.history.back()">Cancel</button>







                </div>






                </div>






</form>



</div>



<?php $__env->stopSection(); ?>





<?php $__env->startSection('css'); ?>







    <!--<link rel="stylesheet" href="/css/admin_custom.css">-->




    

    <link rel="stylesheet" href="<?php echo e(asset('css/alertify.min.css')); ?>">







    <link rel="stylesheet" href="<?php echo e(asset('css/default.min.css')); ?>">







    <style>







        .ajs-content {







            background-color: #17a2b8;







            color: white;







            text-align: center;







            font-weight : bold;







            height : 50px;







            margin-top: -10px;







        }















        .alertify .ajs-header {







            







            display: none;







        }









            .alertify .ajs-dialog {







   







                height: 78px;







                min-height: unset;







                padding: 24px 24px 24px 24px;







   







            }















            .alertify .ajs-commands button.ajs-close {







    background-color: #854361;







}















        .alertify .ajs-body .ajs-content {







            padding: 16px 24px 10px 16px;







}







    </style>







<?php $__env->stopSection(); ?>















<?php $__env->startSection('js'); ?>




<script type="text/javascript">
    $(document).ready(function() {
        var maxField = 20;
        
        // Subcategories
        var addButton = $('.add_button1');
        var wrapper = $('.field_wrapper1');
        var fieldHTML = `<div class="Inclusions">
                            <input type="hidden" name="id[]">
                                                     <div class="form-group row mb-3">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                            <input class="form-control" type="text" name="c_title[]" placeholder="Name">
                            </div>
                            </div>
                                                        <div class="form-group row mb-3">
                    <label class="col-sm-2 col-form-label">Video</label>
                    <div class="col-sm-10">
                          <input class="form-control" type="text" name="video[]" placeholder="Name">
                           </div>
                           </div>
                      
                            <a href="javascript:void(0);" class="remove_button" title="Remove field">
                                <img src="<?php echo e(asset('vendor/adminlte/dist/img/remove-icon.png')); ?>">
                            </a>
                        </div>`;
        var x = 1;
        
        $(addButton).click(function() {
            if (x < maxField) {
                x++;
                $(wrapper).append(fieldHTML);
                initializeEditorss();
            }
        });

        $(wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        });
        function initializeEditorss() {
        $('.editornew1').each(function() {
            var textarea = this;
            if (!$(textarea).hasClass('ckeditor-initialized')) {

                ClassicEditor.create( textarea, {

                        
                        // ckfinder: {
                        //     uploadUrl: '/ckeditor/upload?_token=<?php echo e(csrf_token()); ?>'  // Use your upload URL (with CSRF token)
                        // },
                        toolbar: {

                            items: [

                                'exportPdf',

                                'heading',

                                '|',

                                'bold',

                                'italic',

                                'link',

                                'bulletedList',

                                'numberedList',

                                '|',

                                

                                'imageUpload',

                                'blockQuote',

                                'insertTable',

                                

                                'specialCharacters',

                                'fontColor',

                                'fontSize',

                                'underline',

                                'strikethrough',

                                'pageBreak',

                                'horizontalLine',

                                'fontBackgroundColor',

                                'undo',

                                'redo',

                                'alignment',

                                'mediaEmbed',

                            ]

                        },

                        heading: {
                    options: [
                       { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                    ]
                    },

                        language: 'en',

                        image: {

                            styles: [

                                'alignLeft', 'alignCenter', 'alignRight'

                                ],

                            toolbar: [

                                'imageStyle:alignLeft', 'imageStyle:alignCenter', 'imageStyle:alignRight',

                                'imageTextAlternative',

                                'imageStyle:full',

                                'imageStyle:side'

                            ]

                        },

                        table: {

                            contentToolbar: [

                                'tableColumn',

                                'tableRow',

                                'mergeTableCells'

                            ]

                        },

                        licenseKey: '',

                        extraPlugins: [ MyCustomUploadAdapterPlugin ],	


                    } )

                    .then( editor => {

                        window.editor = editor;
                        $(textarea).addClass('ckeditor-initialized');



                    } )

                    .catch( error => {

                        console.error( 'Oops, something went wrong!' );

                        console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );

                        console.warn( 'Build id: r44fntrg0y2-lxdeldtm5eps' );

                        console.error( error );

                    } );


            }
        });
    }

    initializeEditorss();



});
</script>

    <!-- Include CKEditor script -->






    <script src="<?php echo e(asset('js/alertify.min.js')); ?>"></script> 





    <?php if(session()->has('success')): ?>



    <script>

       // alertify.success('Banner Updated Successfully'); 

       alertify.alert(' Added Successfully').set('basic', true);    </script>


    <?php endif; ?>


    <?php if(session()->has('error')): ?>

    <script>



        alertify.error(' Failed '); 




    </script>

    <?php endif; ?>




    <script src="<?php echo e(asset('ckeditor5/build/ckeditor.js')); ?>"></script>

<script>

 //import Base64UploadAdapter from '@ckeditor/ckeditor5-upload/src/adapters/base64uploadadapter';


 class MyUploadAdapter {

constructor(loader) {
    // The file loader instance to use during the upload.
    this.loader = loader;
}

// Starts the upload process.
upload() {
    return this.loader.file
        .then(file => new Promise((resolve, reject) => {
            this._initRequest();
            this._initListeners(resolve, reject, file);
            this._sendRequest(file);
        }));
}

// Aborts the upload process.
abort() {
    if (this.xhr) {
        this.xhr.abort();
    }
}

// Initializes the XMLHttpRequest object using the URL passed to the constructor.
_initRequest() {
    const xhr = this.xhr = new XMLHttpRequest();
    xhr.open('post', '<?php echo e(route('ckeditor.upload')); ?>', true);
    xhr.responseType = 'json';
}

// Initializes XMLHttpRequest listeners.
_initListeners(resolve, reject, file) {
    const xhr = this.xhr;
    const loader = this.loader;
    const genericErrorText = `Couldn't upload file: ${file.name}.`;

    xhr.addEventListener('error', () => reject(genericErrorText));
    xhr.addEventListener('abort', () => reject());
    xhr.addEventListener('load', () => {
        const response = xhr.response;

        if (!response || response.error) {
            return reject(response && response.error ? response.error.message : genericErrorText);
        }

        resolve({ default: response.url });
    });

    if (xhr.upload) {
        xhr.upload.addEventListener('progress', evt => {
            if (evt.lengthComputable) {
                loader.uploadTotal = evt.total;
                loader.uploaded = evt.loaded;
            }
        });
    }
}

// Prepares the data and sends the request.
_sendRequest(file) {
    const data = new FormData();

    // Append the file and CSRF token to the FormData object
    data.append('upload', file);
    data.append('_token', '<?php echo e(csrf_token()); ?>');  // Add the CSRF token

    // Send the request
    this.xhr.send(data);
}
}




// ...



function MyCustomUploadAdapterPlugin( editor ) {

editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {

    // Configure the URL to the upload script in your back-end here!

    return new MyUploadAdapter( loader );

};

}



	

	ClassicEditor

			.create( document.querySelector( '#editor' ), {

				
                // ckfinder: {
                //     uploadUrl: '/ckeditor/upload?_token=<?php echo e(csrf_token()); ?>'  // Use your upload URL (with CSRF token)
                // },
				toolbar: {

					items: [

						'exportPdf',

						'heading',

						'|',

						'bold',

						'italic',

						'link',

						'bulletedList',

						'numberedList',

						'|',

						

						'imageUpload',

						'blockQuote',

						'insertTable',

						

						'specialCharacters',

						'fontColor',

						'fontSize',

						'underline',

						'strikethrough',

						'pageBreak',

						'horizontalLine',

						'fontBackgroundColor',

						'undo',

						'redo',

						'alignment',

						'mediaEmbed',

					]

				},

                heading: {
options: [
    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
    { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
    { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
    { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
]
},

				language: 'en',

				image: {

					styles: [

                          'alignLeft', 'alignCenter', 'alignRight'

                        ],

					toolbar: [

					    'imageStyle:alignLeft', 'imageStyle:alignCenter', 'imageStyle:alignRight',

						'imageTextAlternative',

						'imageStyle:full',

						'imageStyle:side'

					]

				},

				table: {

					contentToolbar: [

						'tableColumn',

						'tableRow',

						'mergeTableCells'

					]

				},

				licenseKey: '',

				 extraPlugins: [ MyCustomUploadAdapterPlugin ],	


			} )

			.then( editor => {

				window.editor = editor;

		


			} )

			.catch( error => {

				console.error( 'Oops, something went wrong!' );

				console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );

				console.warn( 'Build id: r44fntrg0y2-lxdeldtm5eps' );

				console.error( error );

			} );

</script>













<script>



	



	    Filevalidation = () => {



            const fi = document.getElementById('typ_name');



            // Check if any file is selected.



            if (fi.files.length > 0) {



                for (const i = 0; i <= fi.files.length - 1; i++) {



          



                    const fsize = fi.files.item(i).size;



                    const file = Math.round((fsize / 1024));



                    // The size of the file.



                    if (file >= 1096) {



                        alert(



                          "File too Big, please select a file less than 1mb");



						  $("#typ_name").val('');



                    }



                }



            }



        }





	</script>	




<script>
    flatpickr("#access_start", {
        enableTime: false,
        dateFormat: "Y-m-d", // "K" = AM/PM
        time_24hr: false
    });
</script>


<script>
    flatpickr("#access_end", {
        enableTime: false,
        dateFormat: "Y-m-d ", // "K" = AM/PM
        time_24hr: false
    });
</script>





<script>
        class DynamicFormManager {
            constructor() {
                this.container = document.getElementById('inclusionsContainer');
                this.addBtn = document.getElementById('addMoreBtn');
                this.fieldCount = 1;
                this.maxFields = 10; // Optional: set maximum number of fields
                
                this.init();
            }
            
            init() {
                this.addBtn.addEventListener('click', () => this.addField());
                this.updateRemoveButtons();
                
                // Add form submission handler
                document.getElementById('dynamicForm').addEventListener('submit', (e) => {
                    e.preventDefault();
                    this.handleFormSubmit();
                });
                
                // Add preview functionality
                document.getElementById('previewBtn').addEventListener('click', () => {
                    this.previewFormData();
                });
            }
            
            addField() {
                if (this.fieldCount >= this.maxFields) {
                    alert(`Maximum ${this.maxFields} fields allowed`);
                    return;
                }
                
                const newField = this.createFieldHTML(this.fieldCount);
                this.container.insertAdjacentHTML('beforeend', newField);
                this.fieldCount++;
                
                this.updateRemoveButtons();
                this.attachRemoveHandlers();
                
                // Scroll to the new field
                const newFieldElement = this.container.lastElementChild;
                newFieldElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
                
                // Focus on the first input of the new field
                const firstInput = newFieldElement.querySelector('input[type="text"]');
                if (firstInput) {
                    setTimeout(() => firstInput.focus(), 300);
                }
            }
            
            createFieldHTML(index) {
                return `
                    <div class="Inclusions inclusions-item" data-index="${index}">
                        <input type="hidden" name="id[]">
                        
                        <div class="form-fields">
                            <div class="field-group">
                                <label>Title:</label>
                                <input class="form-control" type="text" name="c_title[]" placeholder="Enter title">
                            </div>
                            
                            <div class="field-group">
                                <label>Vimeo ID:</label>
                                <input  class="form-control" type="text" name="video[]" placeholder="Enter Vimeo ID Here">
                            </div>
                        </div>
                        
                        <a href="javascript:void(0);" class="remove_button" title="Remove field">
                            Delete
                        </a>
                    </div>
                `;
            }
            
            removeField(fieldElement) {
                const allFields = this.container.querySelectorAll('.Inclusions');
                
                // Don't allow removal if this is the last field
                if (allFields.length <= 1) {
                    alert('At least one field must remain');
                    return;
                }
                
                // Add removal animation
                fieldElement.style.transition = 'opacity 0.3s, transform 0.3s';
                fieldElement.style.opacity = '0';
                fieldElement.style.transform = 'translateX(-20px)';
                
                setTimeout(() => {
                    fieldElement.remove();
                    this.fieldCount = this.container.querySelectorAll('.Inclusions').length;
                    this.updateRemoveButtons();
                }, 300);
            }
            
            updateRemoveButtons() {
                const allFields = this.container.querySelectorAll('.Inclusions');
                
                allFields.forEach((field, index) => {
                    const removeBtn = field.querySelector('.remove_button');
                    if (allFields.length > 1) {
                        removeBtn.style.display = 'inline-block';
                    } else {
                        removeBtn.style.display = 'none';
                    }
                });
            }
            
            attachRemoveHandlers() {
                const removeButtons = this.container.querySelectorAll('.remove_button');
                removeButtons.forEach(btn => {
                    btn.removeEventListener('click', this.handleRemove); // Prevent duplicate handlers
                    btn.addEventListener('click', this.handleRemove.bind(this));
                });
            }
            
            handleRemove(event) {
                const fieldElement = event.target.closest('.Inclusions');
                if (fieldElement) {
                    this.removeField(fieldElement);
                }
            }
            
           
        }
        
        // Initialize the form manager when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            new DynamicFormManager();
        });
    </script>








<?php $__env->stopSection(); ?>















      








<?php echo $__env->make('adminlte::page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\xampp\htdocs\oneness_homeo\resources\views/admin/course/create.blade.php ENDPATH**/ ?>