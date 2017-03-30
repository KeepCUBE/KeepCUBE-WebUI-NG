const data = require('./devices.mock')
const LATENCY = 16

export function getAllDevices (cb) {
  Vue.http.get('devices').then(response => {
    console.log(response)
  }, response => {
    console.log(response.status)
  })


  setTimeout(() => {
    cb(data)
  }, LATENCY)
}

export function postNewDevice (device) {
  Vue.http.post('devices', device).then(response => {
    console.log(response)
  }, response => {
    console.log(response)
  })
}

/*
 export function createMessage ({ text, thread }, cb) {
 const timestamp = Date.now()
 const id = 'm_' + timestamp
 const message = {
 id,
 text,
 timestamp,
 threadID: thread.id,
 threadName: thread.name,
 authorName: 'Evan'
 }
 setTimeout(function () {
 cb(message)
 }, LATENCY)
 }
*/
