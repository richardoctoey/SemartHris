<?php
/**
 * This file is part of the Semart HRIS Application.
 *
 * (c) Muhamad Surya Iksanudin <surya.kejawen@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace KejawenLab\Semart\Skeleton\Component\Address;

use KejawenLab\Semart\Skeleton\Component\Contract\Address\DistrictInterface;
use KejawenLab\Semart\Skeleton\Contract\Service\ServiceInterface;
use KejawenLab\Semart\Skeleton\Entity\District;
use KejawenLab\Semart\Skeleton\Repository\DistrictRepository;

/**
 * @author Muhamad Surya Iksanudin <surya.iksanudin@gmail.com>
 */
class DistrictService implements ServiceInterface
{
    private $districtRepository;

    public function __construct(DistrictRepository $districtRepository)
    {
        $districtRepository->setCacheable(true);
        $this->districtRepository = $districtRepository;
    }

    /**
     * @param string $id
     *
     * @return District|null
     */
    public function get(string $id): ?object
    {
        return $this->districtRepository->find($id);
    }

    /**
     * @return District[]
     */
    public function getAll(): array
    {
        return $this->districtRepository->findAll();
    }

    public function commit(DistrictInterface $district, bool $flush = false): void
    {
        $this->districtRepository->commit($district);
        if ($flush) {
            $this->districtRepository->flush();
        }
    }
}