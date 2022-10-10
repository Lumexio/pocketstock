module.exports = {
 // publicPath: process.env.NODE_ENV === 'production'
 //  ? '/my-project/'
 //  : '/',
 // pwa: {
 //  // configure the workbox plugin
 //  workboxPluginMode: 'GenerateSW',
 //  manifestOptions: {
 //   name: "MyApp",
 //   short_name: "MyApp",
 //  }
 // },
 // configureWebpack: {
 //  // other webpack options to merge in ...
 // },
 //Comando para cambiar nombre de dominio en server:   sudo open - a TextEdit / etc / hosts
 // devServer Options don't belong into `configureWebpack`
 devServer: {
  host: '0.0.0.0',
  //host: 'pocketbar.local',
  // webSocketURL: 'ws://0.0.0.0:6001',

  // hot: true,
  // disableHostCheck: true,
 },
};