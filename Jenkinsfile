pipeline {
    agent any
    stages {
        stage('Pull Code') {
            steps {
                sh'''
                ls -l
                rm -rf projectunix || true
                git clone https://github.com/adanmass/projectunix.git
                '''
            }
        }
        
        stage('Deploy part 1') {
            steps {
                sh '''
                   cd unixproject
                   docker ps -a
                   pwd
                   docker compose down -v
                '''
            }
        }
        
        stage('Deploy part 2') {
            steps {
                sh '''
                   cd unixproject
                   docker compose up -d
                '''
            }
        }
    }
}
