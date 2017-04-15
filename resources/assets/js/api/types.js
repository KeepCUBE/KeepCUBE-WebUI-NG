const data = require('./types.mock')
const LATENCY = 16

export function getAllTypes (cb) {
/*
  Vue.http.get('types').then(response => {
    console.log(response.body.data)
  }, response => {
    console.log(response)
  })
*/

  setTimeout(() => {
    cb(data)
  }, LATENCY)
}