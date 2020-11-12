<template>
    <div>
        <div class="p-4 border rounded-top">

            <form class="d-flex flex-column" id='comment-form' @submit.prevent="onSubmit()">
                <textarea placeholder="Write a comment..." name='comment' rows="3" class="p-2" v-model="comment"></textarea>
                <div class="align-self-end">
                    <button class="comment-btn" type='submit'>Post Comment</button>
                </div>
            </form>

        </div>

        <div>
            <div class="text-center py-3" v-if='!paginationData.data'>
                <b-spinner label="Spinning"></b-spinner>
            </div>

            <div>
                <div v-for="comment in paginationData.data" :key="comment.id">
                    {{ comment.id }}
                </div>

                <pagination 
                    
                    :paginationData="paginationData" 
                    :url='url' 
                    @update-pagination='updatePagination'
                    @update-loading='updateLoading'>
                </pagination>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['articleId'],
        data() {
            return {
                paginationData: {},
                comment: '',
                url: '/comment'
            }
        },
        methods: {
            updatePagination: function(data, loading){
                this.paginationData = data
            },
        }
    
    };
</script>

