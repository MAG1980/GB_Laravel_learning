<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                    <ckeditor :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
import CKEditor from '@ckeditor/ckeditor5-vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

export default {
    components:{
        ckeditor:CKEditor.component
    },
    data() {
        return {
            editor: ClassicEditor,
            editorData: '<p>Content of the editor.</p>',
            editorConfig: {
                // The configuration of the editor.
            }
        }
    },
    mounted() {
        console.log( 'Component mounted.' )
    }
}
</script>
