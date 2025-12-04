const express = require("express");
const RepoUser = require("./../repos/repo-user");
const router = express.Router();

router.get("/users", async (req, res, next) => {
  const users = await RepoUser.find();
  res.send(users);
});
router.get("/users/:id", async (req, res, next) => {
  const { id } = req.params;
  const user = await RepoUser.findById(id);
  if (user) {
    res.send(user);
  } else {
    res.sendStatus(404);
  }
});
router.post("/users", async (req, res, next) => {
  const { username, bio } = req.body;
  const user = await RepoUser.insert(username, bio);
  res.send(user);
});
router.put("/users/:id", async (req, res, next) => {
  const { id } = req.params;
  const { username, bio } = req.body;
  const user = await RepoUser.update(id, username, bio);
  if (user) {
    res.send(user);
  } else {
    res.sendStatus(404);
  }
});
router.delete("/users/:id", async (req, res, next) => {
  const { id } = req.params;
  const user = await RepoUser.delete(id);
  if (user) {
    res.send(user);
  } else {
    res.sendStatus(404);
  }
});

module.exports = router;
