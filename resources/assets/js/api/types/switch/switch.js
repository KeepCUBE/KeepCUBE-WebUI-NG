/**
 * Created by ddos on 21.04.17.
 */
export function powerSwitch (deviceId, power) {

  if (power == 'on') {
    power = 1
  } else if (power == 'off') {
    power = 0
  } else {
    console.log('Wrong arguments')
    return
  }

  const cmd = JSON.stringify({device_id: deviceId, power})

    console.log('commanding switch')
  Vue.http.post('commands/switch/toggle', cmd).then(response => {
    console.log(response)
  }, response => {
    console.log(response)
  })

}