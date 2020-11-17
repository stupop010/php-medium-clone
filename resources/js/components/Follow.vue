<template>
    <div class="follow-heart" @click="handleClick">
        <i class="fas fa-heart"></i> {{ this.count }}
    </div>
</template>

<script>
export default {
    props: ["articleId", "followCount"],
    data: function() {
        return {
            count: 0
        };
    },
    mounted: function() {
        console.log(this);
        this.count = this.followCount;
    },
    methods: {
        handleClick: function() {
            axios
                .post("/follow", { articleId: this.articleId })
                .then(res => this.count++)
                .catch(err => console.log(err));
        }
    }
};
</script>
