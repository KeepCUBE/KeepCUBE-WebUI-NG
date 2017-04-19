/**
 * Created by ddos on 19.04.17.
 */
export function sendLedConf (configuration) {

  values = {
    L: 1,
    C: [
      configuration.color
    ],
    T: [
      1000
    ]
  }
  
  JSON.stringify(
    {
      type_id: 1,
      command_scheme: {
        name: 'SLP',
        values: values
      }
    }
  )
  Vue.http.post('commands/execute', configuration).then(response => {
    console.log(response.body)
  }, response => {
    console.log(response.body)
  })
}
