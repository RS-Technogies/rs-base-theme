
let vm = new Vue({
  el: "#app",
  data:function(){
    return {
        text:"Hello",
        properties:[]
    };
  },
  mounted: function(){
    const url="https://paig_api_backend.test/";
      axios.get(url+"api/list")
          .then((response)=>{
              this.properties=response.data.data;
              console.log(this.properties);
          })
          .catch(function (error) {
          console.log(error);
          });
  },
  methods: {
      setStatus(value){
        console.log(value);
      }
  }
});