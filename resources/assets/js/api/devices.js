export function getAllDevices (cb) {
  Vue.http.get('devices').then(response => {
    cb(response.json().data)
  }, response => {
    console.log(response)
  })
}

export function postNewDevice (device, cb) {
  Vue.http.post('devices', device).then(response => {
    cb(device)
  }, response => {
    console.log(response.body)
  })
}

export function deleteDevice (id, cb) {
  Vue.http.delete(`devices/${id}`).then(response => {
    cb(id)
    console.log('device deleted')
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
