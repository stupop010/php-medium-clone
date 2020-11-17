<template>
    <div>
         <button type="button" class='deleteBtn' @click="showModal">
            <i class="fas fa-trash"></i>
        </button>

        <!-- Modal -->
         <b-modal ref="deleteArticle" :title="`Delete ${title}`" hide-footer>
        
                Confirm to delete {{title}}
                <div class="mt-2 d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary mx-1" @click="hideModal">Close</button>
                    <button type="button" class="btn btn-danger mx-1" @click="handleDelete">Delete</button>
                </div>
       
         </b-modal>
    </div>
</template>

<script>
    export default {
        props: ['title', 'articleId', 'slug'],
        methods: {
            showModal: function(){
                this.$refs['deleteArticle'].show()
            },
            hideModal: function(){
                this.$refs['deleteArticle'].hide()
            },
            handleDelete: function(e){
                console.log(this.$refs['delete'])
                // axios.delete(`/article/${this.slug}`, {data: {'articleId': this.articleId}})
                //     .then(res => console.log(res, 'hello'))
                //     .catch(err => console.log(err))
            }
        }
    };
</script>
