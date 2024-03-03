// export default {
//     content: [
//       "./resources/**/*.blade.php",
//       "./resources/**/*.jsx",
//       "./resources/**/*.vue",
//     ],
//     theme: {
//       extend: {},
//     },
//     plugins: [],
//   }


  const withMT = require("@material-tailwind/react/utils/withMT");

  module.exports = withMT({
    content: ["./index.html", "./src/**/*.{vue,js,ts,jsx,tsx}"],
    theme: {
      extend: {},
    },
    plugins: [],
  });
