export function pushAction (action) {

  Vue.http.post('actions', action).then(response => {
    console.log(response)
  }, response => {
    console.log(response)
  })

}

export function customCmd (cmd) {
  Vue.http.post('', cmd).then(response => {
    console.log(response)
  }, response => {
    console.log(response)
  })
}