# The Components of GitHub Actions

## Screenshot of a GitHub Actions Workflow File

```yaml
name: Example Workflow
on: push

jobs:
  example-job:
    runs-on: ubuntu-latest

    steps:
      - name: Checkout Code
        uses: actions/checkout@v2

      - name: Run Custom Action
        uses: ./action-a

      - name: Install Dependencies
        run: npm install -g bats
```

## Overview of Components

GitHub Actions workflows consist of several components that work together to automate tasks or jobs. Here’s a breakdown of these components:

### Workflows
A **workflow** is an automated process added to a repository. It requires at least one job and is triggered by specific events. Common uses include building, testing, packaging, releasing, or deploying a repository's project.

### Jobs
A **job** is a primary section within a workflow. It:
- Is executed by a runner, which can be GitHub-hosted or self-hosted.
- Runs on a machine or in a container, specified using the `runs-on:` attribute. For example, `runs-on: ubuntu-latest` defines that the job will run on the latest version of Ubuntu.

### Steps
A **step** is an individual task within a job. Steps:
- Run commands or actions in sequence.
- Use the `uses:` attribute to include predefined or custom actions.
- Execute specific commands using the `run:` attribute, such as `npm install`.

### Actions
**Actions** are standalone commands within steps. These commands can:
- Use predefined GitHub actions, such as `actions/checkout@v2`.
- Include custom actions defined in your repository (e.g., `uses: ./action-a`).
- Execute commands on the runner directly, such as `run: npm install -g bats`.

---

By understanding these components and their roles, you can effectively utilize GitHub Actions to automate your development workflows.
