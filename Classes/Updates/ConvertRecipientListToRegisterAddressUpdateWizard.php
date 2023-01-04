<?php

namespace Undkonsorten\CuteMailingRegisteraddress\Updates;

use Symfony\Component\Console\Output\OutputInterface;
use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Install\Updates\ChattyInterface;
use TYPO3\CMS\Install\Updates\DatabaseUpdatedPrerequisite;
use TYPO3\CMS\Install\Updates\UpgradeWizardInterface;
use Undkonsorten\CuteMailingRegisteraddress\Domain\Model\RegisteraddressRecipientList;

class ConvertRecipientListToRegisterAddressUpdateWizard implements ChattyInterface, UpgradeWizardInterface
{

    protected string $tablename = 'tx_cutemailing_domain_model_recipientlist';
    /**
     * @inheritDoc
     */
    public function getIdentifier(): string
    {
        return 'cuteMailing_registerAddressConvertWizard';
    }

    /**
     * @inheritDoc
     */
    public function getTitle(): string
    {
        return 'Converts old recipient lists for registeraddess';
    }

    /**
     * @inheritDoc
     */
    public function getDescription(): string
    {
        return 'Old recipient lists are converted to be used as registeraddress recipient lists';
    }

    /**
     * @inheritDoc
     */
    public function executeUpdate(): bool
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable($this->tablename);
        $deleteField = $GLOBALS['TCA']['tx_cutemailing_domain_model_recipientlist']['ctrl']['delete'];
        $query = $queryBuilder->update($this->tablename)
            ->set('record_type',RegisteraddressRecipientList::class)
            ->where(
                $queryBuilder->expr()->and(
                    $queryBuilder->expr()->eq(
                        'record_type',
                        $queryBuilder->createNamedParameter('Undkonsorten\CuteMailing\Domain\Model\TtAddressRecipientList')
                    ),
                    $queryBuilder->expr()->eq(
                        $deleteField,
                        0
                    )
                )
            );
        $rows = $query->executeStatement();
        if($rows > 0) {
            $this->output->writeln('Rows changed: '.$rows.'.');
            return true;
        } else {
            $this->output->writeln('Now rows changed.');
            return false;
        }
    }

    /**
     * @inheritDoc
     */
    public function updateNecessary(): bool
    {
        $updateNeeded = false;
        /** @var QueryBuilder $queryBuilder */
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable($this->tablename);
        $result = $queryBuilder->select('*')
            ->from($this->tablename)
            ->where(
                $queryBuilder->expr()->eq(
                    'record_type',
                    $queryBuilder->createNamedParameter('Undkonsorten\CuteMailing\Domain\Model\TtAddressRecipientList')
                )
            )
            ->execute()->rowCount();
        if ($result > 0) {
            $updateNeeded = true;
            $this->output->writeln('CuteMailing has old recipient lists that can be converted.');
        }
        return $updateNeeded;
    }

    /**
     * @inheritDoc
     */
    public function getPrerequisites(): array
    {
        return [
            DatabaseUpdatedPrerequisite::class,
        ];
    }

    /**
     * @var OutputInterface
     */
    protected $output;

    public function setOutput(OutputInterface $output): void
    {
        $this->output = $output;
    }
}
