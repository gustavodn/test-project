## Usage
- `make build` to build the docker environment
- `make run` to spin up containers
- `make prepare` to install dependencies and run migrations
- `make generate-ssh-keys` to generate JWT certificates
- Navigate to `http://localhost:500/api/v1/docs` to check the Open API v3 documentation
- `make restart` to stop and start containers
- `make ssh-be` to access the PHP container bash
- `make be-logs` to tail dev logs
- `make code-style` to run PHP-CS-FIXER on src and tests
- `make tests` to run the test suite

## Stack:
- `NGINX 1.19` container
- `PHP 7.4 FPM` container
- `MySQL 8.0` container + `volume`