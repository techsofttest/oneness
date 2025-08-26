

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Contact </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<style>
    a.brand-link img {
    display: none;
}
</style>


<div class="card card-info">


<div class="card-header">
<h3 class="card-title">Edit Contact</h3>
</div>


<form action="<?php echo e(route('contact.update',$contact->id)); ?>" method="POST" enctype="multipart/form-data">
<?php echo csrf_field(); ?>
<?php echo method_field('PUT'); ?>

<div class="card-body">


                

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Address</label>
                
                    <div class="col-sm-6">

                    <!-- <input type="text" class="form-control" name="address" placeholder="address" value="<?php echo e($contact->address); ?>" > -->
                    <textarea class="form-control" id="cat_name"  name="address" placeholder="address"><?php echo e($contact->address); ?></textarea>  
                        <!-- <textarea class="form-control" id="editor"  name="address" placeholder="address"><?php echo e($contact->address); ?></textarea> -->
                    </div>
                </div>
                
<!--                 
                 <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Address 2</label>
                
                    <div class="col-sm-6">

                    <input type="text" class="form-control" name="address2" placeholder="address" value="<?php echo e($contact->address2); ?>" >
                        
                    </div>
                </div>
                 -->
               

                <!-- <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Location</label>
                
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="location" placeholder="Location" value="<?php echo e($contact->location); ?>" >
                    </div>
                </div> -->



                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Phone 1</label>
                
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="phone" placeholder="Phone number" value="<?php echo e($contact->phone); ?>" required>
                    </div>
                </div>



   <!-- <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Phone 2</label>
                
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="phone2" placeholder="Phone number" value="<?php echo e($contact->phone2); ?>" required>
                    </div>
                </div> -->

                

              


                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Email</label>
                
                    <div class="col-sm-6">
                        <input type="email" class="form-control" name="email" placeholder="Email address" value="<?php echo e($contact->email); ?>" required>
                    </div>
                </div>

               

               

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Whatsapp </label>
                
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="whatsapp" placeholder="Whatsapp Number" value="<?php echo e($contact->whatsapp); ?>">
                    </div>
                </div>


                


                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Facebook </label>
                
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="facebook" placeholder="facebook Url" value="<?php echo e($contact->facebook); ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Instagram </label>
                
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="instagram" placeholder="Instagram Url" value="<?php echo e($contact->instagram); ?>">
                    </div>
                </div>

               

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Youtube </label>
                
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="youtube" placeholder="Youtube Url" value="<?php echo e($contact->youtube); ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Twitter </label>
                
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="twitter" placeholder="Twitter Url" value="<?php echo e($contact->twitter); ?>">
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Linkedin </label>
                
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="linkedin" placeholder="Linkedin Url" value="<?php echo e($contact->linkedin); ?>">
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

        /* .alertify .ajs-modal {
    
                height : 100px;
            } */

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
    
    <!-- Include CKEditor script -->
 
    <script src="<?php echo e(asset('js/alertify.min.js')); ?>"></script> 

    <?php if(session()->has('success')): ?>
    <script>
       // alertify.success('Banner Updated Successfully'); 
       alertify.alert('Contact Updated Successfully').set('basic', true);    </script>
    <?php endif; ?>

    <?php if(session()->has('error')): ?>
    <script>
        alertify.error('Contact Updation Failed '); 
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







<?php $__env->stopSection(); ?>


      

<?php echo $__env->make('adminlte::page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\xampp\htdocs\oneness_homeo\resources\views/admin/contact/edit.blade.php ENDPATH**/ ?>