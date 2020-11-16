<template>
        <div v-if="paginationData.data && paginationData.total > +this.totalPerPage" class="mt-3">
            <b-pagination
                v-model="currentPage"
                :total-rows="totalPages"
                :per-page="perPage"
                first-number
                last-number
                class="justify-content-center"
            ></b-pagination>
        </div>
</template>

<script>
    export default {
        props: ['paginationData', 'url', 'fetchData', 'totalPerPage'],
        mounted: function(){
            console.log(this)
            axios.get(this.url, {params: {data: this.fetchData}})
                .then(({data}) => this.$emit('update-pagination', data))
                .catch(err => console.log(err))
        },
        methods: {
            paginationFetch(num){
                axios.get(`${this.url}`, {params: {data: this.fetchData, page : num}})
                    .then(({data}) => this.$emit('update-pagination', data))
                    .catch(err => console.log(err))
            }
        }, 
        watch: {
            currentPage(newVal, oldVal){
                // Dont call when the page first mounteds
                    if (typeof oldVal !== 'undefined'){
                        this.paginationFetch(newVal)
                    }
                            
            }    
        },
        computed: {
            currentPage: {
                get(){
                    return this.paginationData.current_page;
                },
                set(value){  
                    return this.paginationData.current_page = value;
                }
            }, 
            totalPages(){
                return this.paginationData.total;
            },
            perPage(){
                return this.paginationData.per_page;
            }
        }
    };
</script>

