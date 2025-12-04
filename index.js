const app = require("./src/app");
const pool = require("./src/pool");
pool
  .connect({
    host: "localhost",
    port: 5432,
    database: "socialnetwork",
    user: "postgres",
    password: "12345",
  })
  .then(() => {
    console.log("connected to postgres database ✅");
    app().listen(3005, () => console.log("listenning to 3005"));
  })
  .catch((err) => console.error(err));
