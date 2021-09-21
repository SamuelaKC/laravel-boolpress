<template>
  <div class="container">
    <div class="row justify-content-center">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col" class="col-2 title-post">Title</th>
            <th scope="col" class="col-8 title-post">Post</th>
            <th scope="col" class="col-2 title-post">Details</th>
          </tr>
        </thead>
        <tbody v-for="post in posts" :key="post.id">
          <tr>
            <td class="title-post">{{ post.titlePost }}</td>
            <td class="text-post">{{ post.textPost }}</td>
            <td class="title-post">
              <button
                type="submit"
                v-on:click="deleteById(post.id)"
                class="btn btn-danger"
              >
                Cancella
              </button>
              <!-- <img :src="post.image" />-->
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li
          v-for="n in totalPage"
          :key="n"
          v-on:click="changePage(n)"
          class="page-item"
        >
          <a class="page-link" href="#">{{ n }}</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script>
export default {
  mounted() {
    this.getPosts()
  },
  data() {
    return {
      posts: [],
      currentPage: 1,
      totalPage: 0,
    }
  },
  methods: {
    getPosts() {
      axios.get(`/api/posts?page=${this.currentPage}`).then((response) => {
        this.posts = response.data.data
        this.totalPage = response.data.last_page
        console.log(response)
      })
    },
    changePage(nPage) {
      this.currentPage = nPage
      this.getPosts()
    },
    deleteById(id) {
      axios.delete(`api/posts/${id}`).then((response) => {
        console.log(response)
        this.getPosts()
      })
      //   alert(id)
    },
  },
}
</script>
// bisogna importarlo anche in webpackmix

<style lang="sass" scoped>
@import '../../sass/prova-css-vuejs.scss'
</style>
