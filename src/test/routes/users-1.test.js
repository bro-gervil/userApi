const request = require("supertest");
const buildApp = require("../../app");
const UserRepo = require("../../repos/repo-user");
const pool = require("../../pool");

const Context = require("./context");
let context;
beforeAll(async () => {
  context = await Context.build();
});

describe("create user table", () => {
  it("create user table", async () => {
    const startCount = await UserRepo.count();

    //   expect(startCount).toEqual(0);

    await request(buildApp())
      .post("/users")
      .send({ username: "test username", bio: "test bio" })
      .expect(200);

    const endCount = await UserRepo.count();
    expect(endCount - startCount).toEqual(1);
  });
});

beforeEach(async () => {
  await context.reset();
});

afterAll(async () => {
  await context.close();
});
