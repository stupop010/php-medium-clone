<template>
    <div>
         <button type="button" class='deleteBtn' @click="showModal">
            <i class="fas fa-trash"></i>
        </button>

        <!-- Modal -->
         <b-modal ref="deleteModal" :title="`Delete ${title}`" hide-footer>
        
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
        props: ['title', 'dataId', 'url'],
        methods: {
            showModal: function(){
                this.$refs['deleteModal'].show()
            },
            hideModal: function(){
                this.$refs['deleteModal'].hide()
            },
            handleDelete: function(){
                axios.delete(this.url, {data: { dataId: this.dataId}})
                    .then(({data} )=> {
                        this.$emit('update-data', data)
                        this.$refs['deleteModal'].hide()
                        })
                    .catch(err => console.log(err))
            }
        }
    };
</script>
