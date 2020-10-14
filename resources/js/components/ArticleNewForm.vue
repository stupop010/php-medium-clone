<template>
    <form @submit.prevent="onSubmit()">
        <div class="form-group">
            <input
                id="title"
                type="text"
                class="form-control form-control-lg"
                name="title"
                placeholder="Article title"
                autocomplete="text"
                v-model="article.title"
                required
                autofocus
            />
        </div>

        <div class="form-group">
            <input
                id="subject"
                type="text"
                class="form-control form-control-md"
                name="subject"
                placeholder="What's this article about?"
                autocomplete="text"
                v-model="article.subject"
                required
                autofocus
            />
        </div>

        <div class="form-group">
            <textarea
                id="body"
                type="text"
                class="form-control form-control-md"
                name="body"
                placeholder="Write your article (in markdown)"
                v-model="article.body"
                rows='8'
                required
                autofocus
            >
            </textarea>
        </div>

        <div class="form-group">
            <input
                id="tags"
                type="text"
                class="form-control"
                name="tags"
                placeholder="Enter tags"
                autocomplete="text"
                @keypress.enter.prevent="handleTagChange"
                v-model="tag"
            />
        </div>
        <div class="d-flex w-100  justify-content-between">
            <ul class="d-flex flex-wrap tag-list">
               <li v-for="tag in articleTags" :key="tag"><i v-on:click='handleDeleteTag' class="fas fa-times mr-1"></i> {{tag}}</li> 
            </ul>
            
            <div>   
                <button class="btn btn-lg btn-primary" type="submit">Submit</button>
            </div>
        </div>
    </form>
</template>

<script>
export default {
    data() {
        return {
            article: {
                title: "",
                body: "",
                subject: ""
            },
            tag: "",
            articleTags: []
        };
    },
    methods: {
        handleTagChange: function(e) {
            this.articleTags.push(e.target.value);
            this.tag = "";
        },
        handleDeleteTag: function(e){
            let listText = e.target.parentNode.textContent.trim()
            this.articleTags = this.articleTags.filter(i => i !== listText)
        },
        onSubmit: function() {
            axios
                .post("/editor", {
                    ...this.article,
                    articleTags: this.articleTags
                })
                .then(res => (window.location.href = "/home"))
                .catch(err => console.log(err));
        }
    }
};
</script>
