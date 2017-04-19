export function pushAction (action) {

  Vue.http.post('actions', action).then(response => {
    console.log(response)
  }, response => {
    console.log(response)
  })

}