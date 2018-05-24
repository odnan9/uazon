// The file contents for the current environment will overwrite these during build.
// The build system defaults to the dev environment which uses `environment.ts`, but if you do
// `ng build --env=prod` then `environment.prod.ts` will be used instead.
// The list of which env maps to which file can be found in `.angular-cli.json`.

export const env = {
    production: false,
    apiPath: "http://localhost:8000/api/",
    oAuthURL: "http://localhost:8000/oauth/token",
    postData: {
        grant_type: "password",
        client_id: 2,
        client_secret: "KcqzXmk1a650lmvMCyj3dVjGScyBmtPCsjnBkAWr",
        username: "api@api.api",
        password: "A8BlXE2Aekvs47ZkVF5Jv8GFY8AqnU41"
    }
};
