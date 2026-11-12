# Security policy

Where this file is silent, the [laranail security policy](https://github.com/laranail/.github/blob/HEAD/SECURITY.md) applies.

## Reporting a vulnerability

Report vulnerabilities privately to `security@simtabi.com`. Never open a public issue for a security problem.

A problem in the waitlist itself (sign-ups, mail, the backend) belongs to
[laranail/waitlist-kit](https://github.com/laranail/waitlist-kit/blob/main/SECURITY.md); report it the same way.

## Scope

- A fresh `create-project` that ships a known credential, a debug setting or a test account.
- The deploy recipe leaving secrets, the database file or `.env` reachable over the web.

## Supported versions

Pre-1.0, only `main` (and later the latest tag) receives fixes.
